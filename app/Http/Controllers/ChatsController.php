<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\Chats;
use App\Http\Requests;

class ChatsController extends Controller
{

    /**
     * ChatsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $loggedInUser = Auth::user()->id;
        $chats = Chats::where('start_user', $loggedInUser)->orWhere('receive_user', $loggedInUser)->get();

        \Response::json($chats->toArray());
    }
}