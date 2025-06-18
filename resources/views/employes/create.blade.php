@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un employé</h1>
    <form action="{{ route('employes.store') }}" method="POST">
        @csrf
        @include('employes.form')
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection