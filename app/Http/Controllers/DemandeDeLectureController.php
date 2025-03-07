<?php

namespace App\Http\Controllers;

use App\Models\DemandeDeLecture;
use App\Models\Document;
use App\Models\User;
use App\Notifications\NewMessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandeDeLectureController extends Controller
{
    public function bulkAction(Request $request)
{
    $demandeIds = $request->input('demandes');
    $action = $request->input('action');
    
    if ($action == 'accepter') {
        DemandeDeLecture::whereIn('id', $demandeIds)->update([
            'statut' => 'approuvee',
            'date_reponse' => now(),
        ]);
        $message = 'Les demandes sélectionnées ont été approuvées.';
    } elseif ($action == 'refuser') {
        DemandeDeLecture::whereIn('id', $demandeIds)->update([
            'statut' => 'refusee',
            'date_reponse' => now(),
        ]);
        $message = 'Les demandes sélectionnées ont été refusées.';
    }
    
    return redirect()->route('demandes.index')->with('success', $message);
}
        // Afficher la liste des demandes (user)
        public function demandeliste(Request $request)
        {
            $userId = auth()->id(); // Récupérer l'ID de l'utilisateur connecté
        
            $query = DemandeDeLecture::with('documents') // Charger la relation 'document'
                ->where('etudiant_id', $userId);
        
            // Appliquer les filtres (facultatif)
            if ($request->has('search') && !empty($request->search)) {
                $query->whereHas('etudiant', function ($q) use ($request) {
                    $q->where('name', 'like', '%' . $request->search . '%');
                });
            }
        
            if ($request->has('document') && !empty($request->document)) {
                $query->whereHas('documents', function ($q) use ($request) {
                    $q->where('titre', 'like', '%' . $request->document . '%');
                });
            }
        
            $demandes = $query->latest()->paginate(5);
        
            return view('demandes.etudiants.demandeliste', compact('demandes'));
        }
        
        
        
        // Afficher la liste des demandes (admin)
    public function index(Request $request)
    {
        $query = DemandeDeLecture::with('etudiant', 'documents');
    
        // Filtrer par recherche d'étudiant
        if ($request->has('search') && !empty($request->search)) {
            $query->whereHas('etudiant', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }
        if($request->has('document') && !empty($request->document)){
            $query->whereHas('documents', function($q) use ($request){
                $q->where('titre','like','%' . $request->document . '%');
            });
        }
    
        // Filtrer par filière
        if ($request->has('filiere') && !empty($request->filiere)) {
            $query->whereHas('etudiant', function ($q) use ($request) {
                $q->where('filiere', $request->filiere);
            });
        }
    
        $demandes = $query->latest()->paginate(5);

    
        return view('demandes.index', compact('demandes'));
    }
    
    // Soumettre une demande
    public function store(Request $request)
    {
        $request->validate([
            'document_id' => 'required|exists:documents,id',
        ]);
    
        // Vérifier si l'étudiant a déjà fait une demande pour ce document
        $existingDemande = DemandeDeLecture::where('etudiant_id', Auth::id())
                                           ->where('document_id', $request->document_id)
                                           ->first();
    
        if ($existingDemande) {
            return redirect()->back()->with('error', 'Vous avez déjà soumis une demande pour ce document.');
        }
    
        // Créer la nouvelle demande de lecture
        $demande = DemandeDeLecture::create([
            'etudiant_id' => Auth::id(),
            'document_id' => $request->document_id,
            'statut' => 'attente',
            'date_demande' => now(),
        ]);
    
        // Notifier l'administrateur
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            $admin->notify(new NewMessageNotification($demande));
        }
    
        return redirect()->back()->with('success', 'Votre demande a été soumise.');
    }
    

    // Accepter une demande
    public function accepter(DemandeDeLecture $demande)
    {
        $demande->update([
            'statut' => 'approuvee',
            'date_reponse' => now(),
        ]);
        $message = "La demande a été accepté avec succès";
        return redirect()->route('demandes.index')->with('success', $message);

    }

    // Refuser une demande
    public function refuser(DemandeDeLecture $demande)
    {
        $demande->update([
            'statut' => 'refusee',
            'date_reponse' => now(),
        ]);
        $message= "La demande a été refusé avec succès";
        return redirect()->route('demandes.index')->with('success', $message);

    }
}
