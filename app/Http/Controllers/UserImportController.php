<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Session;


class UserImportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('importations.import');
    }
  


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv'
        ]);
    
        // Enregistrer l'import dans une variable pour la suite
        $import = Excel::toCollection(new UsersImport, $request->file('file'));
    
        // Liste pour stocker les matricules des utilisateurs importés
        $importedMatricules = [];
    
        // On parcourt les données importées
        foreach ($import[0] as $row) {
            if (!User::where('matricule', $row['matricules'])->exists()) {
                // Si l'utilisateur n'existe pas déjà, ajouter le matricule à la liste
                $importedMatricules[] = $row['matricules'];
            }
        }
    
        // Si aucune donnée n'a été ajoutée, retourner un message d'erreur
        if (empty($importedMatricules)) {
            return back()->with('error', 'Aucune nouvelle donnée à importer.');
        }
    
        // Si des données ont été importées, les insérer
        Excel::import(new UsersImport, $request->file('file'));
    
        // Retourner un message de succès
        return back()->with('success', 'Importation réussie !');
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
    public function destroy(string $id)
    {
        //
    }
}
