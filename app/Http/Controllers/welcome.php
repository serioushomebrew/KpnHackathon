<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthController;
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
        return view('welcome');
    }

    public function building($building)
    {

        return view('building', compact('building'));
    }
}
