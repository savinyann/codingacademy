<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\User;
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Get all orders.
     *
     * @var    App\Order            $orders
     * @return Illuminate\View\View
     */
    public function getAllOrders()
    {
        $orders = Order::all();
        $data['orders'] = $orders;
        return view('orders.orders', $data);
    }

    public function addCard(Request $request)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        if (!$this->isStripeCustomer())
        {
            $customer = $this->createStripeCustomer($request->input('stripeToken'));
        }
        else
        {
            $customer = \Stripe\Customer::retrieve(Auth::user()->stripe_id);
        }
        return view('orders.addCard');
    }

    /**
     * Make a Stripe payment.
     *
     * @param  Illuminate\Http\Request $request
     * @param  App\Product             $product
     * @return chargeCustomer()
     */
    public function postPayWithStripe(Request $request, \App\Bet $bet)  
    {
        $_POST['price'] = $_POST['price'] * 100; 
        if($_POST['team_selected'] == 1)
        {
            $team_selected = $bet->team_1;
            $team_selected_rating = $bet->team_1_rating;
        }
        elseif ($_POST['team_selected'] == 2)
        {
            $team_selected = $bet->team_2;
            $team_selected_rating = $bet->team_2_rating;
        }

        return $this->chargeCustomer($bet->id, $_POST['price'], $team_selected, $team_selected_rating, $request->input('stripeToken'));
    }

    /**
     * Charge a Stripe customer.
     *
     * @var    Stripe\Customer      $customer
     * @param  integer              $product_id
     * @param  integer              $product_price
     * @param  string               $product_name
     * @param  string               $token
     * @return createStripeCharge()
     */
    public function chargeCustomer($bet_id, $bet_price, $team_selected, $team_selected_rating, $token)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        if (!$this->isStripeCustomer())
        {
            $customer = $this->createStripeCustomer($token);
        }
        else
        {
            $customer = \Stripe\Customer::retrieve(Auth::user()->stripe_id);
        }
        return $this->createStripeCharge($bet_id, $bet_price, $team_selected, $team_selected_rating, $customer);
    }

    /**
     * Create a Stripe charge.
     *
     * @var    Stripe\Charge        $charge
     * @var    Stripe\Error\Card    $e
     * @param  integer              $product_id
     * @param  integer              $product_price
     * @param  string               $product_name
     * @param  Stripe\Customer      $customer
     * @return postStoreOrder()
     */
    public function createStripeCharge($bet_id, $bet_price, $team_selected, $team_selected_rating, $customer)
    {
        try {
          $charge = \Stripe\Charge::create(array(
            "amount" => $bet_price,
            "currency" => "eur",
            "customer" => $customer->id,
            "description" => $bet_id
            ));
        } catch(\Stripe\Error\Card $e) {
          return redirect()
            ->route('bets')
            ->with('error', 'Your credit card was been declined. Please try again or contact us.');
        }

        return $this->postStoreOrder($bet_id, $team_selected, $team_selected_rating, $bet_price);
    }

    /**
     * Create a new Stripe customer for a given user.
     *
     * @var    Stripe\Customer $customer
     * @param  string          $token
     * @return Stripe\Customer $customer
     */
    public function createStripeCustomer($token)
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = \Stripe\Customer::create(array(
            "description" => Auth::user()->email,
            "source" => $token

        ));

        Auth::user()->stripe_id = $customer->id;
        Auth::user()->save();

        return $customer;
    }

    /**
     * Check if the Stripe customer exists.
     *
     * @return boolean
     */
    public function isStripeCustomer()
    {
        return Auth::user() && \App\User::where('id', Auth::user()->id)->whereNotNull('stripe_id')->first();
    }

    /**
     * Store a order.
     *
     * @param  string     $product_name
     * @return redirect()
     */
    public function postStoreOrder($bet_id, $team_selected, $team_selected_rating, $bet_price)
    {
        Order::create([
            'user_id' => Auth::user()->id,
            'email' => Auth::user()->email,
            'bet_id' => $bet_id,
            'price' => $bet_price,
            'team_selected' => $team_selected,
            'team_selected_rating' =>$team_selected_rating,
            'deleted_at' => NULL,
        ]);

        return redirect()
            ->route('bets')
            ->with('msg', 'Thanks for your purchase!');
    }

    public function credit($order_id, $user_id, $amount, $rating)
    {
        $user = \App\User::find($user_id);
        $amount = $amount * $rating;
        $user->balance = $user->amount + ( $amount / 100);
        $check = $user->save();
        $message = ($check) ? "This user has been credited" : "An error has occured";
        return $this->destroy($order_id);
    }

    public function destroy($id)
    {
        $order = \App\Order::find($id);
        $check = $order->delete();
        $message = ($check) ? "This bet has been soft deleted" : "An error has occured";
        
        $orders = Order::all();
        $data['orders'] = $orders;
        $data['message'] = $message;
        return view('orders.orders', $data);
    }
}
