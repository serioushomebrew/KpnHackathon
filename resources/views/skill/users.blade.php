@extends('layout.main')


@section('content')
    <h2>Collega's goed in {{ $skill->title }}</h2>
    <ul>
        <li>

            @foreach($skill->users as $user)
                {{ $user->name }}
            @endforeach
        </li>
    </ul>
@endsection