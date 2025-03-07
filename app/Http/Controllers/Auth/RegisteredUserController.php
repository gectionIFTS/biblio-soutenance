<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Afficher la vue d'inscription.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Traiter la demande d'inscription.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
           
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'filiere' => 'required|string|max:255',
            'year' => 'required|in:1,2,3',
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
        ]);

        // Vérifier si l'étudiant existe déjà dans la base de données
        $existingUser = User::where('name', $validatedData['name'])
                            ->where('firstname', $validatedData['firstname'])
                            ->where('email', $validatedData['email'])
                            ->where('filiere', $validatedData['filiere'])
                            ->where('year', $validatedData['year'])
                            ->first();

        if ($existingUser) {
            // Mettre à jour le mot de passe si l'étudiant en saisit un
            if (!empty($validatedData['password'])) {
                $existingUser->password = Hash::make($validatedData['password']);
                $existingUser->save();
            }

            Auth::login($existingUser);
            return redirect(RouteServiceProvider::HOME)->with('success', 'Votre accès aux documents est confirmé.');
        }

        // Si l'étudiant n'existe pas, créer un nouveau compte
        $user = User::create([
           
            'name' => $validatedData['name'],
            'firstname' => $validatedData['firstname'],
            'email' => $validatedData['email'],
            'filiere' => $validatedData['filiere'],
            'year' => $validatedData['year'],
            'password' => Hash::make($validatedData['password']),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
