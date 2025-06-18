<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Employe;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    // Affiche tous les congés
    public function index()
    {
        $conges = Conge::with('employe')->orderBy('created_at', 'desc')->get();
        return view('conges.index', compact('conges'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $employes = Employe::all();
        return view('conges.create', compact('employes'));
    }

    // Enregistre un nouveau congé
    public function store(Request $request)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'motif' => 'required|string|max:255',
        ]);

        Conge::create([
            'employe_id' => $request->employe_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'motif' => $request->motif,
            'statut' => 'En attente',
        ]);

        return redirect()->route('conges.index')->with('success', 'Congé ajouté avec succès.');
    }

    // Affiche le formulaire d’édition
    public function edit(Conge $conge)
    {
        $employes = Employe::all();
        return view('conges.edit', compact('conge', 'employes'));
    }

    // Met à jour un congé
    public function update(Request $request, Conge $conge)
    {
        $request->validate([
            'employe_id' => 'required|exists:employes,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'motif' => 'required|string|max:255',
            'statut' => 'required|string',
        ]);

        $conge->update([
            'employe_id' => $request->employe_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'motif' => $request->motif,
            'statut' => $request->statut,
        ]);

        return redirect()->route('conges.index')->with('success', 'Congé modifié avec succès.');
    }

    // Supprime un congé
    public function destroy(Conge $conge)
    {
        $conge->delete();
        return redirect()->route('conges.index')->with('success', 'Congé supprimé.');
    }
}