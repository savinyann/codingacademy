<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check())
        {
            return redirect()->route('animal');
        }
        return view('home');
    }

    public function my_index()
    {
        if(Auth::check())
        {
            return redirect()->route('animal');
        }
        $data["day"] = date("l");
        $data["heart"] = "<3";
        $_GET["day"] = date("l");
        return view('Home', $data);
    }
}
