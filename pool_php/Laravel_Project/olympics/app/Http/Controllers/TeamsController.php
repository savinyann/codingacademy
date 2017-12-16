<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = \App\Team::All();

        foreach ($teams as $key => $team)
        {
            $team["players"] = \App\Team::find($team->id)->players;
            $team["nb_players"] = \App\Team::find($team->id)->players->count();

            if($team["nb_players"] != 0)
            {
                $teams_f[$key] = $team;
            }
        }
        return view('teams.teams', ["teams" => $teams_f]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $team = new Team;
        $team->name = $_POST["name"];
        $team->country = $_POST["country"];
        $team->flag = $_POST["flag"];

        $check = $team->save();


        $teams = \App\Team::All();

        foreach ($teams as $key => $team)
        {
            $team["players"] = \App\Team::find($team->id)->players;
            $team["nb_players"] = \App\Team::find($team->id)->players->count();

            if($team["nb_players"] != 0)
            {
                $teams_f[$key] = $team;
            }
        }
        $data['teams'] = $teams_f;

        $data['message'] = ($check) ? "$team->name has been added. But you must fill it with player to active it." : "An error has occured.";
        return view('teams.manage',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $check = $team = \App\Team::find($id);
        if($check)
        {
            $team["players"] = \App\Team::find($team->id)->players;
            return view("teams.team", ["team" => $team]);
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $check = $team = \App\Team::find($id);
        if($check)
        {
            return view("teams.edit", ["team" => $team]);
        }
        else
        {
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $team = \App\Team::find($id);
        $team->name = $_POST['name'];
        $team->country = $_POST['country'];
        $team->flag = $_POST['flag'];
        $check = $team->save();

        $message = ($check) ? "$team->name has been edited." : "An error has occured.";

        return view('teams.edit',
            [
            'team' => $team,
            'message' => $message
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = $team = \App\Team::find($id);
        if($check)
        {
            $check = $team->delete();

            $teams = \App\Team::all();

            $message = ($check) ? "$team->name has been deleted" : "An error has occured";

            $data["teams"] = $teams;
            $data["message"] = $message;
            return view('teams.teams', $data);
        }
        else
        {
            return abort(404);
        }
    }


    public function manage()
    {
        $teams = \App\Team::All();

        foreach ($teams as $key => $team)
        {
            $team["players"] = \App\Team::find($team->id)->players;
            $team["nb_players"] = \App\Team::find($team->id)->players->count();

            if($team["nb_players"] != 0)
            {
                $teams_f[$key] = $team;
            }
        }

        $data['teams'] = $teams_f;
        return view('teams.manage', $data);
    }
}