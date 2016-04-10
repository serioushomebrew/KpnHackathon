@extends('layout.main')

@section('content')
    <style>
        .base_sent * {
            text-align: right;
        }

        .base_receive * {
            text-align: left;
        }

        .panel.panel_default {
            left: 0;
            top: 61px;
            right: 0;
            padding-top: 110px;
            position: fixed;
        }

        .panel-heading {
            position: absolute;
            z-index: 100;
            left: 0;
            right: 0;
        }

        .panel-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
        }

        .chat-window > div > .panel {
            border-radius: 5px 5px 0 0;
        }

        .icon_minim {
            padding: 2px 10px;
        }

        .msg_container_base {
            background: #e5e5e5;
            margin: 0;
            padding: 0 10px 10px;
            overflow-x: hidden;
            bottom: 0;
            position: fixed;
            top: 35px;
            right: 0;
            padding-top: 100px;
            margin-bottom: 50px;
            left: 0;
        }

        .top-bar {
            background: #666;
            color: white;
            padding: 10px;
            position: relative;
            overflow: hidden;
        }

        .msg_receive {
            padding-left: 0;
            margin-left: 0;
        }

        .msg_sent {
            padding-bottom: 20px !important;
            margin-right: 0;
        }

        .messages {
            background: white;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            max-width: 100%;
        }

        .messages > p {
            font-size: 13px;
            margin: 0 0 0.2rem 0;
        }

        .messages > time {
            font-size: 11px;
            color: #ccc;
        }

        .msg_container {
            padding: 10px;
            overflow: hidden;
            display: flex;
        }

        img {
            display: block;
            width: 100%;
        }

        .avatar {
            position: relative;
        }

        .base_sent {
            justify-content: flex-end;
            align-items: flex-end;
        }

        .msg_sent > time {
            float: right;
        }

        .msg_container_base::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
            background-color: #F5F5F5;
        }

        .msg_container_base::-webkit-scrollbar {
            width: 12px;
            background-color: #F5F5F5;
        }

        .msg_container_base::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
            background-color: #555;
        }

        .btn-group.dropup {
            position: fixed;
            left: 0px;
            bottom: 0;
        }
    </style>

    <div class="container">
        <div class="row chat-window col-xs-12" id="chat_window_1" style="margin-left:10px;">
            <div class="col-xs-12 col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading top-bar">
                        <div class="col-md-8 col-xs-8">
                            <h3 class="panel-title"><i class="fa fa-comment"></i> <span style="margin-left: 50px;">Conversation with <strong>{{ $otherUser->name }}</strong>
                                    @if($otherUser->room)
                                        Aanwezig in {{ $otherUser->room->floor->building->place }} op verdieping {{ $otherUser->room->floor->level }} in kamer {{ $otherUser->room->order }}
                                    @endif
                                </span>
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body msg_container_base" id="chatbox">

                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="chat-input" type="text" class="form-control input-sm chat_input"
                                   placeholder="Write your message here..."/>
                        <span class="input-group-btn">
                        <button class="btn btn-primary btn-sm" id="btn-chat">Send</button>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
            var Chat = {
                lastChat : 0,

                get : function(roomId){

                    $.ajax({
                        type: 'GET',
                        url: '/chats/'+roomId,
                        headers: {
                            "Content-Type":"application/json"
                        }
                    }).done(function(data) {

                        $.each(data,function(index,item){
//                            console.log(item.id+' > '+Chat.lastChat);
                            if(item.id > Chat.lastChat){
                                Chat.lastChat = item.id;
//                                console.log(item.id+' is hoger!');

                                var html;

                                if(item.user_id != {{ Auth::user()->id }}){
                                    html = '<div class="row msg_container base_sent ">' +
                                            '<div class="col-xs-10 col-md-10">' +
                                            '<div class="messages msg_receive">' +
                                            '<p>'+item.message+'</p>' +
                                            '<time datetime="2009-11-13T20:00"></time>' +
                                            '</div>' +
                                            '</div>' +
                                            '<div class="col-xs-1 avatar">' +
                                            '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">' +
                                            '</div>'+
                                            '</div>'
                                }else {
                                    html = '<div class="row msg_container base_receive ">' +
                                            '<div class="col-xs-1 avatar">' +
                                            '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">' +
                                            '</div>' +
                                            '<div class="col-xs-10 col-md-10">' +
                                            '<div class="messages msg_receive">' +
                                            '<p>'+item.message+'</p>' +
                                            '<time datetime="2009-11-13T20:00"></time>' +
                                            '</div>' +
                                            '</div>'+
                                            '</div>';
                                }
                                $('.msg_container_base').append(html);
                                var objDiv = document.getElementById("chatbox");
                                objDiv.scrollTop = objDiv.scrollHeight;
                            }
                        });
                    });
                },
                say : function(){
                    var roomId = {{ $chatsId }};
                    var userId = {{ Auth::user()->id }};
                    var message = $('#chat-input').val();

                    $.ajax({
                        url: '/chats',
                        type: 'POST',
                        data: {"userId": userId, "message":message, "chatsId": roomId},
                        dataType: 'JSON',
                        success: function (data) {
                            $('#chat-input').val('');
                        }
                    });
                },
                init : function(roomId){

                    $.ajax({
                        type: 'GET',
                        url: '/chats/'+roomId,
                        headers: {
                            "Content-Type":"application/json"
                        }
                    }).done(function(data) {

                        $.each(data,function(index,item){

                            var html;

                            if(item.user_id != {{ Auth::user()->id }}){
                                html = '<div class="row msg_container base_sent ">' +
                                            '<div class="col-xs-10 col-md-10">' +
                                                '<div class="messages msg_receive">' +
                                                    '<p>'+item.message+'</p>' +
                                                    '<time datetime="2009-11-13T20:00"></time>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="col-xs-1 avatar">' +
                                                '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">' +
                                            '</div>'+
                                        '</div>'
                            }else {
                                html = '<div class="row msg_container base_receive ">' +
                                            '<div class="col-xs-1 avatar">' +
                                                '<img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class=" img-responsive ">' +
                                            '</div>' +
                                            '<div class="col-xs-10 col-md-10">' +
                                                '<div class="messages msg_receive">' +
                                                    '<p>'+item.message+'</p>' +
                                                    '<time datetime="2009-11-13T20:00"></time>' +
                                                '</div>' +
                                            '</div>'+
                                        '</div>';
                            }
                            Chat.lastChat = item.id;
                            $('.msg_container_base').append(html);

                            var objDiv = document.getElementById("chatbox");
                            objDiv.scrollTop = objDiv.scrollHeight;

                        });

                        window.setInterval(function(){
                            Chat.get(roomId);
                        }, 1000);

                    });
                }
            };

        $(document).ready(function(){
           Chat.init({{ $chatsId }});

            $('#btn-chat').click(function(){
                Chat.say();
            });

        });
    </script>
@endsection