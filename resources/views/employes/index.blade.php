@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des employés</h1>
    <a href="{{ route('employes.create') }}" class="btn btn-primary mb-3">Ajouter un employé</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('employes.index') }}" method="GET" class="mb-4">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, prénom ou poste..." value="{{ request()->search }}">
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </div>
    <a href="{{ route('employes.export.pdf') }}" class="btn btn-danger mb-3">📄 Exporter en PDF</a>
</form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Poste</th>
                <th>Date d'embauche</th>
                <th>Salaire</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employes as $employe)
                <tr>
                    <td>{{ $employe->nom }}</td>
                    <td>{{ $employe->prenom }}</td>
                    <td>{{ $employe->email }}</td>
                    <td>{{ $employe->poste }}</td>
                    <td>{{ $employe->date_embauche }}</td>
                    <td>{{ $employe->salaire }}</td>
                    <td>
                        <a href="{{ route('employes.edit', $employe->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('employes.destroy', $employe->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection