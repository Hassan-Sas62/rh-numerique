@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des Congés</h2>

    <a href="{{ route('conges.create') }}" class="btn btn-primary mb-3">Ajouter un Congé</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employé</th>
                <th>Date Début</th>
                <th>Date Fin</th>
                <th>Motif</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conges as $conge)
            <tr>
                <td>{{ $conge->employe->nom }} {{ $conge->employe->prenom }}</td>
                <td>{{ $conge->date_debut }}</td>
                <td>{{ $conge->date_fin }}</td>
                <td>{{ $conge->motif }}</td>
                <td>{{ $conge->statut }}</td>
                <td>
                    <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('conges.destroy', $conge->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Supprimer ce congé ?')" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection