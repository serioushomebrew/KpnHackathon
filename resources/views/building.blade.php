@extends('layout.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h2>{{ $building->place }} - {{ count($building->getUsers()) }} plekken beschikbaar </h2>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    @foreach($building->floors as $floor)
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $floor->level }}">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $floor->level }}" aria-expanded="true" aria-controls="collapse{{ $floor->level }}">
                                        <span class="label label-success">{{ count($floor->users) }} plekken</span>
                                        @if($floor->level == 0)
                                            Begane grond
                                        @elseif($floor->level == 1)
                                            1ste verdieping
                                        @else
                                            {{ $floor->level }}de verdieping
                                        @endif

                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $floor->level }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $floor->level }}">
                                <div class="panel-body">
                                    <h3>{{ count($floor->rooms) }} Werkruimtes</h3>


                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection