<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SasRH - Gestion RH Numérique</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <h1 class="display-4 fw-bold">Bienvenue sur <span class="text-primary">SasRH</span></h1>
        <p class="lead mt-3">Le système de gestion des ressources humaines simple, rapide et sécurisé.<br>
        Idéal pour les entreprises africaines et modernes.</p>

        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">Se connecter</a>
            <a href="#contact" class="btn btn-outline-secondary btn-lg">Demander une démo</a>
        </div>

        <div class="mt-5">
            <h3>✅ Fonctionnalités clés</h3>
            <ul class="list-unstyled">
                <li>✔ Gestion des employés</li>
                <li>✔ Présence & absences en un clic</li>
                <li>✔ Demande et suivi des congés</li>
                <li>✔ Tableau de bord clair</li>
            </ul>
        </div>

        <div class="mt-5" id="contact">
            <h4>📞 Contact</h4>
            <p>Développé par Hassane Abdoulaye (Maroc - Tchad)<br>
            Email : <a href="mailto:hassansasabdoulaye@mail.com"></a>hassansasabdoulaye@mail.com</p>
        </div>
    </div>
</body>
</html>