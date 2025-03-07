<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeDeLecture extends Model
{
    use HasFactory;

    protected $table = 'demandes_de_lecture';

    protected $fillable = [
        'etudiant_id',
        'document_id',
        'statut',
        'date_demande',
        'date_reponse',
    ];

    protected $casts = [
        'date_demande' => 'datetime',
        'date_reponse' => 'datetime',
    ];

    public function etudiant()
    {
        return $this->belongsTo(User::class, 'etudiant_id');
    }

    public function documents()
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
    

}
