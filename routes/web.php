<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Route pour afficher la liste des personnes
    Route::get('/persons', [PersonController::class, 'index'])->name('person.index');

    // Route pour afficher le formulaire de création d'une personne
    Route::get('/persons/create', [PersonController::class, 'create'])->name('person.create');

    // Route pour stocker une nouvelle personne (formulaire soumis)
    Route::post('/persons', [PersonController::class, 'store'])->name('person.store');
});

// Route pour afficher les détails d'une personne spécifique
Route::get('/persons/{id}', [PersonController::class, 'show'])->name('person.show');

// Route par défaut pour la page d'accueil
Route::get('/', function () {
    return view('welcome');
});
