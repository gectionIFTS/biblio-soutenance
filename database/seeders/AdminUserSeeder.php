<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'matricule' => '123',
            'name' => 'natha',
            'firstname' => 'dfd',
            'email' => 'admin@gmail.com',  // Remplacez par l'email souhaité
            'password' => Hash::make('password123'),  // Remplacez par le mot de passe souhaité
            'role' => 'admin',
            'filiere' =>'' ,
            'year'=>''
            // Attribuer le rôle admin
        ]);
    }
}
