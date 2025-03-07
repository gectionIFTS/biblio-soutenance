<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.**/
   
    public function index(Request $request)
    {
        // Récupérer les valeurs des filtres de recherche
        $search = $request->input('search');
        $filiere = $request->input('filiere');
        $directeur = $request->input('directeur');
        $annee = $request->input('annee');
    
        // Requête pour filtrer les étudiants
        $etudiants = User::where('role', 'user')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('firstname', 'LIKE', "%{$search}%")
                    ->orWhere('matricule', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            })
            ->when($filiere, function ($query, $filiere) {
                return $query->where('filiere', $filiere);
            })
            ->when($directeur, function ($query, $directeur) {
                return $query->where('directeur', 'LIKE', "%{$directeur}%");
            })
            ->when($annee, function ($query, $annee) {
                return $query->where('annee', $annee);
            })
            ->paginate(10);
    
        return view('etudiants.index', compact('etudiants'));
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $etudiant = User::where('role', 'etudiant')->findOrFail($id);
    
        // Supprimer les relations associées
        $etudiant->demandes()->delete(); 
        $etudiant->documents()->delete();
    
        // Supprimer l'étudiant
        $etudiant->delete();
    
        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }
    
}