<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Bet;
use App\Fixture;

class BetsController extends Controller
{
    protected static $teams_list;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bets = \App\Bet::All();
        $data['bets'] = $bets;
        return view('bets.bets', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setTeams();
        return view('bets.add', ['teams_list' => self::$teams_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bet::create([
            'team_1' => $_POST['team_1'],
            'team_1_rating' => $_POST['team_1_rating'],
            'team_2' => $_POST['team_2'],
            'team_2_rating' => $_POST['team_2_rating'],
        ]);

        $bets = \App\Bet::All();
        $data['bets'] = $bets;
        return view('bets.bets', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {     
        $bets = \App\Bet::All();
        $data['bets'] = $bets;
        return view('bets.show', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bet = \App\Bet::find($id);
        $check = $bet->delete();
        $message = ($check) ? "This bet has been deleted" : "An error has occured";
        $bets = \App\Bet::All();
        $data['message'] = $message;
        $data['bets'] = $bets;
        return view('bets.bets', $data);   
    }

     /**
     * Store teams in a table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setTeams()
    {
        $teams = \App\Team::All();
        foreach($teams as $key => $team)
        {
            $teams_list[$team->name] = $team->name;
        }
        return self::$teams_list = $teams_list;
    }
}
