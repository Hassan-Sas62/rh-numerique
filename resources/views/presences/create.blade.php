@extends('layouts.app')

@section('content')
<h1>Enregistrer la présence des employés</h1>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif

<form action="{{ route('presences.store') }}" method="POST">
    @csrf

    <label for="date">Date :</label>
    <input type="date" name="date" id="date" value="{{ date('Y-m-d') }}" required>

    <table border="1" cellpadding="5" cellspacing="0" style="margin-top:10px;">
        <thead>
            <tr>
                <th>Employé</th>
                <th>Présent</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employes as $employe)
                <tr>
                    <td>{{ $employe->nom }} {{ $employe->prenom }}</td>
                    <td>
                        <input type="checkbox" name="presences[{{ $employe->id }}]" value="1" checked>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" style="margin-top: 10px;">Enregistrer</button>
</form>
@endsection