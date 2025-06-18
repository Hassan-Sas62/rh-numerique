<?php
namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EmployeController extends Controller
{
    

public function exportPDF()
{
    $employes = Employe::all();
    $pdf = Pdf::loadView('employes.pdf', compact('employes'));
    return $pdf->download('liste_employes.pdf');
}


   public function index(Request $request)
{
    $search = $request->input('search');

    $employes = Employe::when($search, function ($query, $search) {
        return $query->where('nom', 'like', "%$search%")
                     ->orWhere('prenom', 'like', "%$search%")
                     ->orWhere('poste', 'like', "%$search%");
    })->latest()->paginate(10);

    return view('employes.index', compact('employes', 'search'));
}
   public function dashboard()
{
    $total = Employe::count();
    $salaireTotal = Employe::sum('salaire');
    $moyenneSalaire = Employe::avg('salaire');

    return view('dashboard', [
        'total' => $total,
        'salaireTotal' => $salaireTotal,
        'moyenneSalaire' => $moyenneSalaire,
    ]);
}

    public function create()
    {
        return view('employes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:employes',
            'poste' => 'required',
            'date_embauche' => 'required|date',
            'salaire' => 'required|numeric'
        ]);

        Employe::create($request->all());

        return redirect()->route('employes.index')->with('success', 'Employé ajouté.');
    }

    public function edit(Employe $employe)
    {
        return view('employes.edit', compact('employe'));
    }

    public function update(Request $request, Employe $employe)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:employes,email,' . $employe->id,
            'poste' => 'required',
            'date_embauche' => 'required|date',
            'salaire' => 'required|numeric'
        ]);

        $employe->update($request->all());

        return redirect()->route('employes.index')->with('success', 'Employé mis à jour.');
    }

    public function destroy(Employe $employe)
    {
        $employe->delete();
        return redirect()->route('employes.index')->with('success', 'Employé supprimé.');
    }
}
