<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $table = 'presences';  // bien sans accent

    protected $fillable = ['employe_id', 'date', 'est_present'];

    public function employe()
    {
        return $this->belongsTo(Employe::class);
    }
}