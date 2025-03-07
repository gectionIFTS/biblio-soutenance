<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="grid grid-cols-2 lg:grid-cols-2 gap-4">
        @csrf

        <!-- Checkbox: Appartenance à l'établissement -->
        {{-- <div class="col-span-2 flex items-center">
            <input type="checkbox" id="isInternal" class="mr-2">
            <label for="isInternal" class="text-sm text-gray-700">Je fais partie de l'établissement</label>
        </div>

        <!-- Matricule -->
        <div>
            <x-input-label for="matricule" :value="('Matricule')" />
            <x-text-input id="matricule" name="matricule" type="text" class="block mt-1 w-full" :value="old('matricule')" disabled />
            <x-input-error :messages="$errors->get('matricule')" class="mt-2" />
        </div> --}}

        <!-- Nom -->
        <div>
            <x-input-label for="name" :value="('Nom')" />
            <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Prénom -->
        <div>
            <x-input-label for="firstname" :value="('Prénom')" />
            <x-text-input id="firstname" name="firstname" type="text" class="block mt-1 w-full" :value="old('firstname')" required />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="('Email')" />
            <x-text-input id="email" name="email" type="email" class="block mt-1 w-full" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Filière -->
        <div>
            <x-input-label for="filiere" :value="('Filière')" />
            <select id="filiere" name="filiere" class="mt-2 w-full rounded-lg border border-gray-300 p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                <option value="genie-electrique">Génie électrique</option>
                <option value="genie-civil">Génie civil</option>
            </select>
            <x-input-error :messages="$errors->get('filiere')" class="mt-2" />
        </div>

        <!-- Année -->
        <div>
            <x-input-label for="year" :value="('Année')" />
            <select id="year" name="year" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                <option value="" disabled selected>{{ __('Choisissez votre année') }}</option>
                <option value="1" @selected(old('year') == '1')>1ère Année</option>
                <option value="2" @selected(old('year') == '2')>2ème Année</option>
                <option value="3" @selected(old('year') == '3')>3ème Année</option>
            </select>
            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>

        <!-- Mot de passe -->
        <div>
            <x-input-label for="password" :value="('Mot de passe')" />
            <x-text-input id="password" name="password" type="password" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmation mot de passe -->
        <div>
            <x-input-label for="password_confirmation" :value="('Confirmez le mot de passe')" />
            <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="block mt-1 w-full" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Bouton -->
        <div class="md:col-span-2 flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>
            <x-primary-button class="ml-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Script pour gérer l'activation/désactivation du champ Matricule -->
    <script>
        document.getElementById('isInternal').addEventListener('change', function () {
            document.getElementById('matricule').disabled = !this.checked;
        });
    </script>
</x-guest-layout>
