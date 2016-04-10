<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Chats;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

use App\Http\Requests;


class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loggedInUser = Auth::user()->id;
        $chats = Chats::where('start_user', $loggedInUser)->orWhere('receive_user', $loggedInUser)->get();
        foreach ($chats as &$chat) {
            $chat->start_user_name = User::where('id', $chat->start_user)->get(['name'])->first()->name;
            $chat->receive_user_name = User::where('id', $chat->receive_user)->get(['name'])->first()->name;
        }
        if($request->ajax())
            return \Response::json($chats->toArray());
        return view('chats.index', compact('chats', 'loggedInUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // add a new chat message(row into chat table)
        $newChat = new Chat();
        $newChat->chats_id = $request->input("chatsId");
        $newChat->user_id = $request->input("userId");
        $newChat->message = $request->input("message");
        // @TODO: set the content-type to application/json in view ajax
        return \Response::json($newChat->save());
    }

    /**
     * Display the specified resource.
     *
     * @param $chatsId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($chatsId)
    {
        $chat = Chat::where('chats_id', $chatsId)->get();
        return \Response::json($chat->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
