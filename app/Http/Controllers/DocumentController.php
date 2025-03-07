<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function lecture(Document $document)
{
    return view('layouts.documents.lecture', compact('document'));
}

    public function index2(Request $request) {
        $query = Document::query();

        // Recherche par filière exacte
        if ($request->filled('filiere')) {
            $query->where('filiere', $request->filiere);
        }

        // Recherche par directeur (avec LIKE)
        if ($request->filled('directeur')) {
            $query->where('directeur', 'LIKE', '%' . $request->directeur . '%');
        }

        // Recherche par année (avec LIKE)
        if ($request->filled('annee')) {
            $query->where('annee', 'LIKE', '%' . $request->annee . '%');
        }

        // Recherche globale sur plusieurs colonnes
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('titre', 'LIKE', $searchTerm)
                  ->orWhere('auteur', 'LIKE', $searchTerm)
                  ->orWhere('description', 'LIKE', $searchTerm)
                  ->orWhere('filiere', 'LIKE', $searchTerm)
                  ->orWhere('directeur', 'LIKE', $searchTerm)
                  ->orWhere('annee', 'LIKE', $searchTerm);
            });
        }

        return view('layouts.documents.index2', [
            'documents' => $query->paginate(36)
        ]);
    }

    public function index(Request $request)
    {
        $query = Document::query();

        // Recherche par filière exacte
        if ($request->filled('filiere')) {
            $query->where('filiere', $request->filiere);
        }

        // Recherche par directeur (avec LIKE)
        if ($request->filled('directeur')) {
            $query->where('directeur', 'LIKE', '%' . $request->directeur . '%');
        }
        if ($request->filled('search')) {
            $searchTerm = '%' . $request->search . '%';
            $query->where(function ($q) use ($searchTerm) {
                $q->where('titre', 'LIKE', $searchTerm)
                  ->orWhere('auteur', 'LIKE', $searchTerm)
                  ->orWhere('description', 'LIKE', $searchTerm)
                  ->orWhere('filiere', 'LIKE', $searchTerm)
                  ->orWhere('directeur', 'LIKE', $searchTerm)
                  ->orWhere('annee', 'LIKE', $searchTerm);
            });
        }
        // Recherche par année (avec LIKE)
       
        return view('layouts.documents.index', ['documents' => $query->paginate(6)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.depot');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:2099',
            'filiere' => 'required|string|in:genie-electrique,genie-informatique,genie-civil',
            'description' => 'required|string',
            'document' => 'required|file|mimes:pdf,doc,docx,txt|max:5120',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'directeur' => 'required|string|max:255'
        ]);

        $documentPath = $request->file('document')->storeAs('documents', time() . '_' . $request->file('document')->getClientOriginalName(), 'public');
        $photoPath = $request->hasFile('photo') ? $request->file('photo')->storeAs('photos', time() . '_' . $request->file('photo')->getClientOriginalName(), 'public') : null;

        $document = new Document();
        $document->titre = $validated['titre'];
        $document->auteur = $validated['auteur'];
        $document->annee = $validated['annee'];
        $document->filiere = $validated['filiere'];
        $document->description = $validated['description'];
        $document->chemin_fichier = $documentPath;
        $document->photo = $photoPath;
        $document->directeur = $validated['directeur'];
        $document->save();

        return redirect()->route("documents.index")->with('success', 'Document déposé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $document = Document::findOrFail($id);
        return view("layouts.documents.show", ["document" => $document]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $document = Document::findOrFail($id);
        return view('layouts.documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $document = Document::findOrFail($id);

        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'annee' => 'required|integer|min:1900|max:2099',
            'filiere' => 'required|string|in:genie-electrique,genie-informatique,genie-civil',
            'description' => 'required|string|max:1000',
            'document' => 'nullable|file|mimes:pdf,doc,docx,txt|max:5120',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'directeur' => 'required|string|max:255'
        ]);

        $document->update($validated);

        if ($request->hasFile('document')) {
            if ($document->chemin_fichier) {
                Storage::delete('public/' . $document->chemin_fichier);
            }
            $documentPath = $request->file('document')->storeAs('documents', time() . '_' . $request->file('document')->getClientOriginalName(), 'public');
            $document->chemin_fichier = $documentPath;
        }

        if ($request->hasFile('photo')) {
            if ($document->photo) {
                Storage::delete('public/' . $document->photo);
            }
            $photoPath = $request->file('photo')->storeAs('photos', time() . '_' . $request->file('photo')->getClientOriginalName(), 'public');
            $document->photo = $photoPath;
        }

        $document->save();

        return redirect()->route('documents.index')->with('success', 'Document mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);

        // Supprime les fichiers associés
        if ($document->chemin_fichier) {
            Storage::delete('public/' . $document->chemin_fichier);
        }

        if ($document->photo) {
            Storage::delete('public/' . $document->photo);
        }

        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Document supprimé avec succès.');
    }
}
