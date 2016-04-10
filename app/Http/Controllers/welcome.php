<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Models\Building;
use Illuminate\Http\Request;

use App\Http\Requests;

class welcome extends Controller
{


    /**
     * welcome constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $buildings = Building::all();
        return view('welcome', compact('buildings'));
    }

    public function building($building)
    {
        $building = Building::where('place',$building)->first();

        if(is_null($building) || !$building->exists()){
            die('Locatie niet gevonden'); // HAHA dit mag eigenlijk niet maar ik doe het toch #hackathon
        }

        return view('building', compact('building'));
    }
}
