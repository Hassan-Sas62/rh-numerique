<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = [
        'nom',
        'prenom', // <-- Make sure 'prenom' is here
        'email',  // If you have an 'email' field
        'poste',
        'date_embauche',
        'salaire'
        // ... any other columns you want to allow mass assignment for
    ];

    public function presences()
{
    return $this->hasMany(Presence::class);
}

public function conges()
{
    return $this->hasMany(Conge::class);
}
    // ... rest of your model
}