<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referee;

class RefereesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $referees = \App\Referee::All();
        $data['referees'] = $referees;
        return view('referees.referees', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $referees = \App\Referee::All();
        $data['referees'] = $referees;
        return view('referees.add', $data);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $referee = new Referee;
        $referee->name = $_POST['name'];
        $referee->deleted_at = NULL;
        $check = $referee->save();
        $message = ($check) ? "$referee->name has been added." : "An error has occured.";

        $referees = \App\Referee::All();
        $data['referees'] = $referees;
        $data['message'] = $message;
        return view('referees.referees', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $referee = \App\Referee::find($id);
        $check = $referee->delete();

        return $this->index();
    }
}
