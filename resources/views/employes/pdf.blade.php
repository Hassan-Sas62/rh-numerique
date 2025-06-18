<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Liste des employés</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; font-size: 12px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Liste des employés</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Poste</th>
                <th>Date Embauche</th>
                <th>Salaire (FCFA)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employes as $employe)
                <tr>
                    <td>{{ $employe->nom }}</td>
                    <td>{{ $employe->prenom }}</td>
                    <td>{{ $employe->email }}</td>
                    <td>{{ $employe->poste }}</td>
                    <td>{{ $employe->date_embauche }}</td>
                    <td>{{ number_format($employe->salaire, 0, ',', ' ') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>