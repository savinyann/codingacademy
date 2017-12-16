<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fixture;
use App\Http\Requests\Fixtures_Add_Fixture;

class FixturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fixtures = \App\Fixture::orderBy('date', 'desc')->get();
        foreach ($fixtures as $key => $fixture)
        {
            $fixture = $this->getForeign($fixture);
            $fixture->placement = ($fixture->placement != 0) ? '1/'.pow(2, $fixture->placement) : 'Final';
        }
        $data['fixtures'] = $fixtures;

        return view('fixtures.fixtures', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->setValue();
        return view('fixtures.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Fixtures_Add_Fixture $request)
    {
        $fixture = new Fixture;
        $fixture->date = $_POST['date'];
        $fixture->scoreboard = $_POST['scoreboard1'].'-'.$_POST['scoreboard2'];
        $fixture->winner_id = $_POST['winner_id'];
        $fixture->team1_id = $_POST['team1_id'];
        $fixture->team2_id = $_POST['team2_id'];
        $fixture->placement = $_POST['placement'];
        $fixture->meteo_id = $_POST['meteo'];
        $fixture->goals = array_sum(explode("-",$fixture->scoreboard));
        $fixture->faults = $_POST['faults1']+$_POST['faults2'];
        $fixture->referee_id = $_POST['referee_id'];

        $check = $fixture->save();


        $data = $this->setValue();
        $data['message'] = ($check) ? "Fixture has been saved." : "An error has occured.";
        $fixtures = \App\Fixture::All();
        foreach ($fixtures as $key => $fixture)
        {
            $fixture = $this->getForeign($fixture);
            $fixture->placement = ($fixture->placement != 0) ? '1/'.pow(2, $fixture->placement) : 'Final';
        }
        $data['fixtures'] = $fixtures;

        return view('fixtures.manage', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $check = $data['fixture'] = \App\Fixture::find($id);

        if($check)
        {
            return view('fixtures.fixture', $data);
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
        $fixture = \App\Fixture::find($id);
        if($fixture)
        {
            $fixture = $this->getForeign($fixture);
            $fixture->scoreboard = explode("-", $fixture->scoreboard);
            $data = $this->setValue();
            $data['fixture'] = $fixture;

            return view('fixtures.edit', $data);
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
        $fixture = new Fixture;
        $fixture->date = $_POST['date'];
        $fixture->scoreboard = $_POST['scoreboard1'].'-'.$_POST['scoreboard2'];
        $fixture->winner_id = $_POST['winner_id'];
        $fixture->team1_id = $_POST['team1_id'];
        $fixture->team2_id = $_POST['team2_id'];
        $fixture->placement = $_POST['placement'];
        $fixture->meteo_id = $_POST['meteo'];
        $fixture->goals = array_sum(explode("-",$fixture->scoreboard));
        $fixture->faults = $_POST['faults'];
        $fixture->referee_id = $_POST['referee_id'];

        $check = $fixture->save();
        $data = $this->setValue();
        $data['message'] = ($check) ? "Fixture has been edited." : "An error has occured.";

        $fixture = \App\Fixture::find($id);
        $fixture = $this->getForeign($fixture);
        $fixture->scoreboard = explode("-", $fixture->scoreboard);

        $data['fixture'] = $fixture;


        return view('fixtures.add', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }


    public function manage()
    {
        $data = $this->setValue();
        $fixtures = \App\Fixture::orderBy('date', 'desc')->get();
        foreach ($fixtures as $key => $fixture)
        {
            $fixture = $this->getForeign($fixture);
            $fixture->placement = ($fixture->placement != 0) ? '1/'.pow(2, $fixture->placement) : 'Final';
        }
        $data['fixtures'] = $fixtures;

        return view('fixtures.manage', $data);
    }


    protected function setValue()
    {
        $teams_list = \App\Team::select('id', 'name')->get();
        foreach ($teams_list as $key => $team)
        {
            $data["teams_list"][$team->id] = $team->name;
        }

        $meteo_list = \App\Meteo::select('id', 'meteo')->get();
        foreach ($meteo_list as $key => $meteo)
        {
            $data["meteo_list"][$meteo->id] = $meteo->meteo;
        }

        $referees_list = \App\Referee::select('id', 'name')->get();
        foreach ($referees_list as $key => $referee)
        {
            $data["referees_list"][$referee->id] = $referee->name;
        }

        for ($i = 5; $i >= 0 ; $i--)
        {
            $data['placement_list'][$i] = ($i != 0) ?"1/".pow(2, $i) : 'Final';
        }

        return($data);
    }


    protected function getForeign($fixture)
    {
        $fixture['winner'] = \App\Team::find($fixture->winner_id)->name;
        $fixture['team1'] = \App\Team::find($fixture->team1_id)->name;
        $fixture['team2'] = \App\Team::find($fixture->team2_id)->name;

        $fixture['meteo'] = \App\Meteo::find($fixture->meteo_id)->meteo;
        $fixture['referee'] = \App\Referee::find($fixture->referee_id)->name;
        $fixture['goals'] = array_sum(explode("-",$fixture->scoreboard));
        return($fixture);
    }
}
