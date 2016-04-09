<?php

namespace App\Http\Controllers;

use App\Models\Building;


use App\Http\Requests;

class DebugController extends Controller
{
    public static function test()
    {
//        $building = Building::where(["id" => 2])->first();
//        dd($building->floors);

//        $floors = $building->floors;
//        dd($floors);

//        foreach ($floors as $floor) {
//            echo "<br/>Floor: " . $floor->title . " on level: " . $floor->level."<br/>";
//            foreach ($floor->rooms as $room) {
//                echo "has Room: ".$room->title."<br/>";
//            }
//        }

//        $rooms = $building->rooms;
//        dd($rooms);

        $building = Building::where(["id" => 1])->first();
//        dd($building->rooms);

        $users = $building->getUsers();
        dd($users);
        dd(count($users));
    }
}
