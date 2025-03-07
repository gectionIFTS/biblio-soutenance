<?php 
namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Auth\Events\Registered;
class UsersImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Vérifier si un utilisateur avec ce matricule existe déjà
        if (User::where('matricule', $row['matricules'])->exists()) {
            return null; // Éviter les doublons
        }
        $email = strtolower(str_replace([' ', '-', '\t'], '', $row['nom'] . $row['prenoms']) . '@gmail.com');


        $user= new User([
            'firstname' => $row['prenoms'] ?? '', // Valeur par défaut si absente
            'name' => $row['nom'] ?? '', 
            'matricule' => $row['matricules'], // Matricule obligatoire
            'filiere' => $row['filières'] ?? '', // Optionnel
            'year' => $row['année'] ?? '', // Optionnel
            'email' => $row['email'] ?? $email, // Optionnel
            'password' => Hash::make('password123'),
            'role' => 'user',
        ]);
        event(new Registered($user));
        return $user;
    }
}
