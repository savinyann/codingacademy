<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Player_History;
use App\Team;
use App\Http\Requests\Players_Add_Player;

class PlayersController extends Controller
{
    protected static $teams_list;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = \App\Player::All();
        foreach($players as $key => $player)
        {
            $players[$key]['team'] = \App\Player::find($player->id)->teams->name;
            $player['age'] = (date('Y-m-d') - $player->birthdate)." ans";
        }       
        return view('players.players', ['players' => $players]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        self::setTeams();
        return view('players.add', ['teams_list' => self::$teams_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Players_Add_Player $request)
    {
        $player = new Player;
        $player->name = $_POST['name'];
        $player->birthdate = $_POST['birthdate'];
        $player->team_id = $_POST['team_id'];
        $player->HP = $_POST['HP'];
        $player->SP = $_POST['SP'];
        $player->EN = $_POST['EN'];
        $player->AT = $_POST['AT'];
        $player->PA = $_POST['PA'];
        $player->BL = $_POST['BL'];
        $player->SH = $_POST['SH'];
        $player->CA = $_POST['CA'];
        $check = $player->save();
        $message = ($check) ? "" : "An error has occured (players).";
        $new = \App\Player::where('name', $player->name)
                          ->where('birthdate', $player->birthdate)
                          ->where('team_id', $player->team_id)
                          ->get();
        if($check)
        {
            $id = $new[0]->id;
            $history = new Player_history;
            $history->player_id = $id ;
            $history->team_id = $_POST['team_id'];
            $history->enrollment_date = date('Y-m-d H:i:s');
            $history->leaving_date = NULL;
            $check = $history->save();
            $message = ($check) ? "$player->name has been added." : "An error has occured (players history).";
        }
        self::setTeams();
        $players = \App\Player::All();
        foreach($players as $key => $player)
        {
            $players[$key]['team'] = \App\Player::find($player->id)->teams->name;
            $player['age'] = (date('Y-m-d') - $player->birthdate)." ans";
        }
        $data['players'] = $players;
        $data['teams_list'] = self::$teams_list;
        $data['message'] = $message;
        return view('players.manage', $data);
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
            $teams_list[$team->id] = $team->name;
        }
        return self::$teams_list = $teams_list;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $check = $player = \App\Player::find($id);
        if($check)
        {
            $player['age'] = (date('Y-m-d') - $player->birthdate)." ans";
            $player['team'] = \App\Player::find($player->id)->teams->name;      
            return view('players.player', ['player' => $player]);
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
        self::setTeams();
        $check = $player = \App\Player::find($id);
        if($check)
        {
            $data['player'] = $player;
            $data['teams_list'] = self::$teams_list;
            return view('players.edit', $data);
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
    public function update(Players_Add_Player $request, $id)
    {
        $player = \App\Player::find($id);
        $player->name = $_POST['name'];
        $player->birthdate = $_POST['birthdate'];
        $player->team_id = $_POST['team_id'];
        $player->HP = $_POST['HP'];
        $player->SP = $_POST['SP'];
        $player->EN = $_POST['EN'];
        $player->AT = $_POST['AT'];
        $player->PA = $_POST['PA'];
        $player->BL = $_POST['BL'];
        $player->SH = $_POST['SH'];
        $player->CA = $_POST['CA'];
        $check = $player->save();
        $message = ($check) ? "" : "An error has occured (players).";
        
        if($check)
        {
            $history = \App\Player_History::where('player_id', $player->id)
                                          ->orderBy('enrollment_date', 'desc')
                                          ->limit(1)
                                          ->get();
            $history_id = \App\Player_History::find($history[0]->id);
            $history_id->team_id = $player->team_id;
            $history_id->enrollment_date = $history[0]->enrollment_date;
            $history_id->leaving_date = NULL;
            $check = $history_id->save();
            $message = ($check) ? "$player->name has been edited." : "An error has occured.";
        }
       
        self::setTeams();
        $data['teams_list'] = self::$teams_list;
        $data['player'] = $player;
        $data['message'] = $message;
        return view('players.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function transfert($id)
    {
        $check = $player = \App\Player::find($id);
        if($check)
        {
            self::setTeams();
            $data['player'] = $player;
            $data['teams_list'] = self::$teams_list;
            return view('players.transfert', $data);
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
     public function updatePlayerTeam($id)
     {
        $player = \App\Player::find($_POST['player_id']);
        $player->team_id = $_POST['team_id'];
        $check = $player->save();
        $message = ($check) ? "" : "An error has occured";
        if($check)
        {
            $history = \App\Player_History::where('player_id', $player->id)
            ->orderBy('enrollment_date', 'desc')
            ->limit(1)
            ->get();
            $history_id = \App\Player_History::find($history[0]->id);
            $history_id->leaving_date = date('Y-m-d H:i:s');
            $check = $history_id->save();
            $message = ($check) ? "" : "An error has occured";

            if($check)
            {
                $history = new Player_History;
                $history->player_id = $player->id;
                $history->team_id = $player->team_id;
                $history->enrollment_date = date('Y-m-d H:i:s');
                $history->leaving_date = NULL;
                $check = $history->save();
                $message = ($check) ? "$player->name has been transfered to a new team" : "An error has occured"; 
            }
        }

        $players = \App\Player::All();
        foreach($players as $key => $player)
        {
             $players[$key]['team'] = \App\Player::find($player->id)->teams->name;
        }      
        $data['message'] = $message;
        $data['players'] = $players;
        return view('players.players', $data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $players = \App\Player::All();
        $player = \App\Player::find($id);
        $check = $player->delete();

        self::setTeams();
        $players = \App\Player::All();
        foreach($players as $key => $player)
        {
            $players[$key]['team'] = \App\Player::find($player->id)->teams->name;
            $player['age'] = (date('Y-m-d') - $player->birthdate)." ans";
        }
        $data['players'] = $players;
        $data['teams_list'] = self::$teams_list;
        return view('players.manage', $data);

        $data['message'] = ($check) ? "$player->name has been deleted" : "An error has occured";

        $data['players'] = $players;
        return view('players.manage', $data);
    }


    public function manage()
    {
        self::setTeams();
        $players = \App\Player::All();
        foreach($players as $key => $player)
        {
            $players[$key]['team'] = \App\Player::find($player->id)->teams->name;
            $player['age'] = (date('Y-m-d') - $player->birthdate)." ans";
        }
        $data['players'] = $players;
        $data['teams_list'] = self::$teams_list;
        return view('players.manage', $data);
    }
}
