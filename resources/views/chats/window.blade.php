@extends('layout.main')

@section('content')
    <style>
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
                            <h3 class="panel-title"><i class="fa fa-comment"></i> <span style="margin-left: 50px;">Conversation with <strong>{{ $otherUser->name }}</strong></span>
                            </h3>
                        </div>
                    </div>
                    <div class="panel-body msg_container_base">
                        @foreach($chatMessages as $message)
                            @if ($message->user->id == $otherUser->id)
                                <div class="row msg_container base_receive">
                                    <div class="col-xs-1 avatar">
                                        <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg"
                                             class=" img-responsive ">
                                    </div>
                                    <div class="col-md-10 col-xs-10">
                                        <div class="messages msg_sent">
                                            <p>{{ $message->message }}</p>
                                            <time datetime="2009-11-13T20:00">{{ $message->user->name }}
                                                • {{ date("H:i") }}</time>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row msg_container base_sent ">
                                    <div class="col-xs-10 col-md-10">
                                        <div class="messages msg_receive">
                                            <p>{{ $message->message}}</p>
                                            <time datetime="2009-11-13T20:00">{{ $message->user->name }}
                                                • {{ date("H:i") }}</time>
                                        </div>
                                    </div>
                                    <div class="col-xs-1 avatar">
                                        <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg"
                                             class=" img-responsive ">
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-sm chat_input"
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

    <script>
        function LoadFinance() {
            $(function () {
                $.getJSON(
                        "",
                        function (json) {
                            $('#finance').text(json.query.results.quote.Change);
                            // Patching payload into page element ID = "dog" });
                        });
            }

            $(document).ready(function () {

            });
    </script>
@endsection