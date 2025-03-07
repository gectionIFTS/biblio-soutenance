<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'auteur',
        'annee',
        'filiere',
        'description',
        'chemin_document',
        'chemin_fichier',
        'photo',
        'directeur'
    ];
    public function demandesDeLecture()
    {
        return $this->hasMany(DemandeDeLecture::class);
    }
    
    public function estApprouvePourUtilisateur($userId)
    {
        $demande = $this->demandesDeLecture()
            ->where('etudiant_id', $userId)
            ->where('statut', 'approuvee')
            ->first();
    
        return !is_null($demande);
    }
    // Dans le modèle Document
public function etudiant()
{
    return $this->belongsTo(User::class);
}

    

}
