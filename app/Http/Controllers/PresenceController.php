<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Presence; 

class PresenceController extends Controller
{
    //use App\Models\Presence;



public function create()
{
    $employes = Employe::all();
    return view('presences.create', compact('employes'));
}



    public function absentsDuJour()
    {
        $date = now()->toDateString();

        $absents = Presence::with('employe')
            ->where('date', $date)
            ->where('est_present', false)
            ->get();

        return view('presences.absents', compact('absents', 'date'));
    }



public function store(Request $request)
{
    $request->validate([
        'date' => 'required|date',
        'presences' => 'required|array',
        'presences.*' => 'boolean',
    ]);

    $date = $request->date;

    foreach ($request->presences as $employe_id => $est_present) {
        \App\Models\Presence::updateOrCreate(
            ['employe_id' => $employe_id, 'date' => $date],
            ['est_present' => $est_present]
        );
    }

    return redirect()->route('presences.create')->with('success', 'Présences enregistrées avec succès !');
}
    // Optionnel: méthode pour enregistrer présence (à développer)
}

