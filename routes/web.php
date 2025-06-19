<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\PresenceController;


Route::get('/', function () {
    return view('welcome');

});
Route::get('/presences/create', [PresenceController::class, 'create'])->name('presences.create');
Route::post('/presences', [PresenceController::class, 'store'])->name('presences.store');
Route::get('/absents', [PresenceController::class, 'absentsDuJour'])->name('absents.jour');
Route::resource('conges', CongeController::class)->middleware('auth');
Route::resource('conges', CongeController::class);
Route::get('/employes/pdf', [EmployeController::class, 'exportPDF'])->name('employes.export.pdf');
// ✅ Route du tableau de bord avec variables depuis EmployeController
Route::get('/dashboard', [EmployeController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

// ✅ Routes sécurisées pour les employés et le profil utilisateur
Route::middleware('auth')->group(function () {
    Route::resource('employes', EmployeController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';