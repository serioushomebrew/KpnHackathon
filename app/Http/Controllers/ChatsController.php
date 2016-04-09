<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $chats = Chats::all();

        \Response::json($chats->toArray());
    }
}