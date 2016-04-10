<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
use App\Models\Building;
use App\Models\Skill;
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

    public function skillSearch($search)
    {
        $skills = Skill::where('title','LIKE', '%'.$search.'%')->get();

        return \Response::json($skills->toArray());
    }

    public function indexUser($skillId)
    {
        $skill = Skill::find($skillId);

        return view('skill.users', compact('skill'));


    }

    public function searchUsersWithSkills($query) {
        //->orWhere('description', 'like', '%'.$query.'%')
        $skills = Skill::where('title', 'like', '%'.$query.'%')->get();
        $users = [];
        foreach ($skills as $skill) {
            foreach ($skill->users as $sku)
                $users[$skill->id][] = $sku;
        }
        return \Response::json($users);
    }
}
