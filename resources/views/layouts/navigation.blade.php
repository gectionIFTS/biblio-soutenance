<nav x-data="{ open: false }" class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- Logo et Nom -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
                <span class="text-lg text-gray-900 font-bold">INSTITUT DE FORMATION TECHNIQUE SUPÉRIEURE</span>
            </div>

            <!-- Menu principal -->
            <div class="hidden sm:flex space-x-6">
                <a href="{{ route('dashboard') }}" class="hover:text-purple-500 transition duration-300 mr-3">IFTS</a>
                <a href="#" class="hover:text-purple-500 transition duration-300 mx-6">Cours</a>
                <a href="#" class="hover:text-purple-500 transition duration-300">Contact</a>
            </div>

            <!-- Notifications -->
            <div class="relative mr-4">
                <button id="notification-btn" class="relative">
                    <span class="text-xl text-gray-700">🔔</span>
                    @if(auth()->user()->unreadNotifications->count() > 0)
                        <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-2 py-0.5">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                    @endif
                </button>

                <div id="notification-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg z-50 ring-1 ring-gray-200">
                    <ul class="divide-y divide-gray-200">
                        @forelse(auth()->user()->unreadNotifications as $notification)
                            <li class="p-3 hover:bg-gray-100 transition duration-200">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-700">{{ $notification->data['message'] }}</span>
                                    <a href="#" class="mark-as-read text-blue-500 text-sm" data-id="{{ $notification->id }}">
                                        Marquer comme lue
                                    </a>
                                </div>
                            </li>
                        @empty
                            <li class="p-3 text-gray-500">Aucune notification</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Dropdown Profil -->
            <div class="hidden sm:flex items-center space-x-4">
                <x-dropdown align="right">
                    <x-slot name="trigger">
                        <button class="flex items-center space-x-2 px-3 py-2 bg-white text-purple-700 font-medium rounded-md hover:bg-gray-200 transition duration-300">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profil</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                Déconnexion
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Bouton Menu Mobile -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open" class="p-2 rounded-md hover:bg-gray-600 transition duration-300">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div x-show="open" class="sm:hidden bg-purple-800">
        <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-purple-600 transition duration-300">Accueil</a>
        <a href="#" class="block px-4 py-2 hover:bg-purple-600 transition duration-300">Cours</a>
        <a href="#" class="block px-4 py-2 hover:bg-purple-600 transition duration-300">Contact</a>
        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-purple-600 transition duration-300">Profil</a>
        <form method="POST" action="{{ route('logout') }}" class="block">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-purple-600 transition duration-300">Déconnexion</button>
        </form>
    </div>
</nav>

<script>
document.getElementById('notification-btn').addEventListener('click', function() {
    document.getElementById('notification-dropdown').classList.toggle('hidden');
});

document.querySelectorAll('.mark-as-read').forEach(button => {
    button.addEventListener('click', function() {
        let notificationId = this.getAttribute('data-id');

        fetch(`/notifications/${notificationId}/mark-as-read`, {
            method: 'POST',
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            }
        }).then(response => response.json()).then(data => {
            if (data.success) {
                this.parentElement.parentElement.remove(); // Retirer la notification de la liste
                // Réduire le nombre d'alertes non lues si nécessaire
            }
        });
    });
});
</script>
