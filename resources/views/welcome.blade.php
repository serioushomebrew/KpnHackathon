@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row full">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <h1 class="text-center">Kies je gewenste locatie</h1>
                <div class="row">
                    <div class="col-xs-12 col-md-6 building">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="{!! route('building',['building' => 'Groningen']) !!}">
                                    {{ Html::image('images/buildings/1.jpg', 'Location', ['class' => 'img-responsive center-block', 'data-toggle' => 'tooltip', 'data-placement' => 'left', 'title' => 'Groningen']) }}
                                </a>
                            </div>
                            <div class="col-xs-12 text-center">
                                <h3>
                                    <span class="label label-success">234 plekken</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 building">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="{!! route('building',['building' => 'Zwolle']) !!}">
                                    {{ Html::image('images/buildings/2.jpg', 'Location', ['class' => 'img-responsive center-block', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Zwolle']) }}
                                </a>
                            </div>
                            <div class="col-xs-12 text-center">
                                <h3>
                                    <span class="label label-warning">61 plekken</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 building">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="{!! route('building',['building' => 'Amsterdam']) !!}">
                                    {{ Html::image('images/buildings/3.jpg', 'Location', ['class' => 'img-responsive center-block', 'data-toggle' => 'tooltip', 'data-placement' => 'left', 'title' => 'Amsterdam']) }}
                                </a>
                            </div>
                            <div class="col-xs-12 text-center">
                                <h3>
                                    <span class="label label-danger">Vol</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 building">
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="{!! route('building',['building' => 'Rotterdam']) !!}">
                                    {{ Html::image('images/buildings/4.jpg', 'Location', ['class' => 'img-responsive center-block', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Rotterdam']) }}
                                </a>
                            </div>
                            <div class="col-xs-12 text-center">
                                <h3>
                                    <span class="label label-success">167 plekken</span>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection