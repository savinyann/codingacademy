<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meteo;


class MeteoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meteo = \App\Meteo::All();
        $data['meteo'] = $meteo;
        return view('meteo.meteo', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $meteo = \App\Meteo::All();
        $data['meteo'] = $meteo;
        return view('meteo.add', $data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $meteo = new Meteo;
        $meteo->meteo = $_POST['meteo'];
        $check = $meteo->save();
        $message = ($check) ? "A new meteo condition has been added." : "An error has occured.";

        $meteo = \App\Meteo::All();
        $data['meteo'] = $meteo;
        $data['message'] = $message;
        return view('meteo.meteo', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $meteo = \App\Meteo::find($id);
        $meteo->delete();
        return $this->index();
    }
}
