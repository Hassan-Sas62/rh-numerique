@extends('layouts.app')

@section('content')
<h1>Absents du {{ $date }}</h1>

@if($absents->isEmpty())
    <p>Aucun absent aujourd'hui.</p>
@else
    <ul>
    @foreach($absents as $presence)
        <li>{{ $presence->employe->nom }} {{ $presence->employe->prenom }}</li>
    @endforeach
    </ul>
@endif

@endsection