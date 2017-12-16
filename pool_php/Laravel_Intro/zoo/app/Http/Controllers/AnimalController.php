<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AnimalController extends Controller
{
	public function index($id)
	{
		if(!Auth::check())
		{
			return redirect()->route('Home');
		}

		$array["animal"] = DB::table("animal")->select("animal.*", "gender.gender")->leftjoin("gender", "animal.gender_id", "=", "gender.id")->where("animal.id", $id)->first();

 		return(view("Animal", $array));
	}


	public function add()
	{
		if(!Auth::check())
		{
			return redirect()->route('Home');
		}

		if(isset($_POST["type"]))
		{
			$animal["type"] = $_POST["type"];
			$animal["name"] = $_POST["name"];
			$animal["age"] = $_POST["age"];
			$animal["gender_id"] = $_POST["gender_id"];
			$animal["height"] = $_POST["height"];
		
			$return = DB::table("animal")->insert($animal);
		}
		$echo["echo"] = (isset($return)) ? (($return == TRUE) ? "Animal added" : "An error has occured") : "";
		return(view("Animal.Add", $echo));
	}
}

?>