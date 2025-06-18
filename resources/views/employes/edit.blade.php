@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'employé</h1>
    <form action="{{ route('employes.update', $employe->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('employes.form')
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection