<?php

namespace App\Notifications;

use App\Models\DemandeDeLecture;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewMessageNotification extends Notification
{
    use Queueable;

    protected $demande;

    public function __construct(DemandeDeLecture $demande)
    {
        $this->demande = $demande;
    }

    public function via($notifiable)
    {
        return ['database']; // Stocker dans la base de données
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Nouvelle demande de lecture de " . $this->demande->etudiant->name . " pour le document '" . $this->demande->documents->titre . "'.",
            'demande_id' => $this->demande->id
        ];
    }
}
