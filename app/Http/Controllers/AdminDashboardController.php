<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DemandeDeLecture;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Statistiques générales
        $totalDocuments = Document::count();
        $totalDemandes = DemandeDeLecture::count();
        $totalEtudiants = User::count();

        // Récupération des statistiques mensuelles
        $documentsParMois = Document::selectRaw('MONTH(created_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->orderBy('mois')
            ->pluck('total', 'mois')
            ->toArray();

        $etudiantsParMois = User::selectRaw('MONTH(created_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->orderBy('mois')
            ->pluck('total', 'mois')
            ->toArray();

        $demandesParMois = DemandeDeLecture::selectRaw('MONTH(created_at) as mois, COUNT(*) as total')
            ->groupBy('mois')
            ->orderBy('mois')
            ->pluck('total', 'mois')
            ->toArray();

        // Remplir les mois manquants avec des zéros
        for ($i = 1; $i <= 12; $i++) {
            $documentsParMois[$i] = $documentsParMois[$i] ?? 0;
            $etudiantsParMois[$i] = $etudiantsParMois[$i] ?? 0;
            $demandesParMois[$i] = $demandesParMois[$i] ?? 0;
        }

        return view('adminDashboard', compact(
            'totalDocuments', 'totalEtudiants', 'totalDemandes',
            'documentsParMois', 'etudiantsParMois', 'demandesParMois'
        ));
    }
}
