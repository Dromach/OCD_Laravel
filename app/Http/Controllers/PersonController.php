<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonController extends Controller
{
    // Méthode pour stocker une nouvelle personne
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_names' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        // Formatage des données
        $firstName = ucfirst(strtolower($request->input('first_name')));
        $middleNames = $request->input('middle_names') ? ucfirst(strtolower($request->input('middle_names'))) : null;
        $lastName = strtoupper($request->input('last_name'));
        $birthName = $request->input('birth_name') ? strtoupper($request->input('birth_name')) : $lastName;
        $dateOfBirth = $request->input('date_of_birth') ? date('Y-m-d', strtotime($request->input('date_of_birth'))) : null;

        // Créer la nouvelle personne
        $person = new Person();
        $person->first_name = $firstName;
        $person->middle_names = $middleNames;
        $person->last_name = $lastName;
        $person->birth_name = $birthName;
        $person->date_of_birth = $dateOfBirth;
        $person->created_by = Auth::id(); // ID de l'utilisateur authentifié

        $person->save(); // Sauvegarder la personne dans la base de données

        // Rediriger vers l'index avec un message de succès
        return redirect()->route('person.index')->with('success', 'Personne créée avec succès!');
    }
}
