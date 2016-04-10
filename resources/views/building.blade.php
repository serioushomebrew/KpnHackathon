@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h2>{{ $building->place }} - {{ $building->freeSpots()  }} plekken beschikbaar </h2>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($building->floors as $floor)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $floor->level }}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $floor->level }}" aria-expanded="true" aria-controls="collapse{{ $floor->level }}">
                                        <span class="label label-success">{{ $floor->freeSpots() }} plekken</span>
                                        @if($floor->level == 0)
                                            Begane grond
                                        @elseif($floor->level == 1)
                                            1ste verdieping
                                        @else
                                            {{ $floor->level }}de verdieping
                                        @endif
                                        -
                                        {{ count($floor->rooms) }} Werkruimtes
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $floor->level }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $floor->level }}">
                                <div class="panel-body">
                                    <div class="row">
                                        @foreach($floor->rooms as $room)
                                            <div class="col-xs-6 room-panel">
                                                <div class="panel">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-xs-12">
                                                                <h3 class="pull-left">
                                                                    @if($room->order == 1)
                                                                        {{ $room->order }}ste Kamer
                                                                    @else
                                                                        {{ $room->order }}de Kamer
                                                                    @endif
                                                                </h3>

                                                                <h4 class="h4-label">
                                                                    <span class="label label-success pull-left">{{ $room->freeSpots() }} beschikbare plekken</span>
                                                                </h4>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            @if(count($room->users) ==0)
                                                                <div class="col-xs-12">
                                                                    <p style="height: 116px;">Deze kamer is nog helemaal leeg.</p>
                                                                </div>
                                                            @endif
                                                            @foreach($room->users as $user)
                                                                <div class="col-xs-6 room-panel">
                                                                    <div class="panel panel-primary">
                                                                        <div class="panel-heading">
                                                                            <div class="row">
                                                                                <div class="col-xs-3">
                                                                                    <img class="img-responsive img-circle" src="{{ $user->image }}" alt="{{ $user->name }}">
                                                                                </div>
                                                                                <div class="col-xs-9 text-right">
                                                                                    <div class="user-name">{{ $user->name }}</div>
                                                                                    <div>
                                                                                        @foreach($user->skills as $skill)
                                                                                            <span class="label label-success">{{ $skill->title }}</span>
                                                                                        @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <a href="{{ url('/newChat/'.$user->id) }}">
                                                                            <div class="panel-footer">
                                                                                <span class="pull-left"><i class="fa fa-comments"></i> Open chat</span>
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
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                            {{--<div class="row">--}}
                                                {{--<div class="col-xs-12">--}}

                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<li><i class="fa-li fa fa-desktop"></i>--}}
                                                {{--@if($room->order == 1)--}}
                                                    {{--{{ $room->order }}ste Kamer--}}
                                                {{--@else--}}
                                                    {{--{{ $room->order }}de Kamer--}}
                                                {{--@endif--}}
                                                {{--- <span class="label label-success">{{ $room->freeSpots() }}</span> plekken--}}
                                                {{--</li>--}}

                                                    {{--<div class="row">--}}
                                                        {{--@foreach($room->users as $user)--}}
                                                            {{----}}
                                                            {{--<div class="col-xs-3">--}}
                                                                {{--<div class="row">--}}
                                                                    {{--<div class="col-xs-3">--}}
                                                                        {{--<img src="https://randomuser.me/api/portraits/med/{{ $user->id %2 ? 'women' : 'men' }}/{{ rand(1,99) }}.jpg" class="img-responsive img-rounded" alt="{{$user->name}}">--}}
                                                                    {{--</div>--}}
                                                                    {{--<div class="col-xs-9">--}}
                                                                        {{--{{ $user->name }}--}}
                                                                        {{-----}}
                                                                        {{--@foreach($user->skills as $skill)--}}
                                                                            {{--({{ $skill->title }})--}}
                                                                        {{--@endforeach--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--@endforeach--}}
                                                    {{--</div>--}}

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection