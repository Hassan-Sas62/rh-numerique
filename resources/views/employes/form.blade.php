<div class="mb-3">
    <label for="nom" class="form-label">Nom</label>
    <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom', $employe->nom ?? '') }}">
</div>

<div class="mb-3">
    <label for="prenom" class="form-label">Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ old('prenom', $employe->prenom ?? '') }}">
</div>

<div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $employe->email ?? '') }}">
</div>

<div class="mb-3">
    <label for="poste" class="form-label">Poste</label>
    <input type="text" class="form-control" id="poste" name="poste" value="{{ old('poste', $employe->poste ?? '') }}">
</div>

<div class="mb-3">
    <label for="date_embauche" class="form-label">Date d'embauche</label>
    <input type="date" class="form-control" id="date_embauche" name="date_embauche" value="{{ old('date_embauche', $employe->date_embauche ?? '') }}">
</div>

<div class="mb-3">
    <label for="salaire" class="form-label">Salaire</label>
    <input type="number" step="0.01" class="form-control" id="salaire" name="salaire" value="{{ old('salaire', $employe->salaire ?? '') }}">
</div>