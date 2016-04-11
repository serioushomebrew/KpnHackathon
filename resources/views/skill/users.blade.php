@extends('layout.main')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h2>Collega's goed in {{ $skill->title }}</h2>
            </div>
           </div>

    <div class="row">
        @foreach($skill->users as $user)

            <div class="col-xs-4 room-panel">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <img class="img-responsive img-circle"
                                     src="{{ $user->image }}"
                                     alt="{{ $user->name }}">
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="user-name">{{ $user->name }}</div>
                                <div>
                                    Aanwezig in {{ $user->room->floor->building->place }} op verdieping {{ $user->room->floor->level }} in kamer {{ $user->room->order }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('/newChat/'.$user->id) }}">
                        <div class="panel-footer">
                                                                                <span class="pull-left"><i
                                                                                            class="fa fa-comments"></i> Open chat</span>
                                                                                <span class="pull-right"><i
                                                                                            class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        @endforeach

    </div>
    </div>
@endsection