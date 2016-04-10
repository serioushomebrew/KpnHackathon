@extends('layout.main')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your chat conversations</div>

                <div class="panel-body">
                    @foreach($chats as $k => $chat)
                        <div class="col-md-4 alert alert-success" style="margin-right:1em">
                            <a href="{{ route('chats.show', $chat->id) }}">Chatting with: {{ ($loggedInUser == $chat->start_user ? $chat->receive_user_name : $chat->start_user_name) }}</a>
                            <i class="fa fa-comment pull-right"></i>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection