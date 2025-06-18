@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un Congé</h2>

    <form action="{{ route('conges.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="employe_id">Employé</label>
            <select name="employe_id" class="form-control" required>
                @foreach($employes as $employe)
                    <option value="{{ $employe->id }}">{{ $employe->nom }} {{ $employe->prenom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date début</label>
            <input type="date" name="date_debut" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date fin</label>
            <input type="date" name="date_fin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Motif</label>
            <input type="text" name="motif" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('conges.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection