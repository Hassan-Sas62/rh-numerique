@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier un Congé</h2>

    <form action="{{ route('conges.update', $conge->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="employe_id">Employé</label>
            <select name="employe_id" class="form-control" required>
                @foreach($employes as $employe)
                    <option value="{{ $employe->id }}" {{ $employe->id == $conge->employe_id ? 'selected' : '' }}>
                        {{ $employe->nom }} {{ $employe->prenom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date début</label>
            <input type="date" name="date_debut" class="form-control" value="{{ $conge->date_debut }}" required>
        </div>

        <div class="mb-3">
            <label>Date fin</label>
            <input type="date" name="date_fin" class="form-control" value="{{ $conge->date_fin }}" required>
        </div>

        <div class="mb-3">
            <label>Motif</label>
            <input type="text" name="motif" class="form-control" value="{{ $conge->motif }}" required>
        </div>

        <div class="mb-3">
            <label>Statut</label>
            <select name="statut" class="form-control" required>
                <option value="En attente" {{ $conge->statut == 'En attente' ? 'selected' : '' }}>En attente</option>
                <option value="Approuvé" {{ $conge->statut == 'Approuvé' ? 'selected' : '' }}>Approuvé</option>
                <option value="Rejeté" {{ $conge->statut == 'Rejeté' ? 'selected' : '' }}>Rejeté</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Modifier</button>
        <a href="{{ route('conges.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection