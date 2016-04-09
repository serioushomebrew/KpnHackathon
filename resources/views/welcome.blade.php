@extends('layout.main')


@section('content')
    <div class="container-fluid">
        <div class="row full">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <h1 class="text-center">Kies je gewenste locatie</h1>
                <div class="row">
                    @foreach($buildings as $building)
                        <div class="col-xs-12 col-md-6 building">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a href="{!! route('building',['building' => $building->place]) !!}">
                                        {{ Html::image('images/buildings/'.$building->id.'.jpg', 'Location', ['class' => 'img-responsive center-block', 'data-toggle' => 'tooltip', 'data-placement' => $building->id % 2 ? 'left' : 'right', 'title' => $building->place]) }}
                                    </a>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <h3>
                                        <span class="label label-success">{{ count($building->getUsers()) }} plekken</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection