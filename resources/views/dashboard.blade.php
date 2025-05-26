<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("BIENVENU SUR LA PAGE DE IFTS (https://www.ifts-tg.com )") }}
                </div>
            </div>
        </div>
    </div>

    <!-- Fleche retour en bas à droite -->
    <a href="javascript:history.back()" class="fixed bottom-6 right-6 bg-gray-800 text-white p-4 rounded-full shadow-lg hover:bg-gray-900 transition-all duration-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5M12 19l-7-7 7-7"></path></svg>
    </a>

</x-app-layout>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <style>
        .chart-container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }
        .card{
            transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Animation fluide */
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre douce */
            background-color: #fff;
        }
        .card:hover{
            background-color: #1577e644
        }
        .dashboard-grid {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
    </style>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="navbar-container fixedr">
        @include('layouts.navigation')
    </div>

    <div class="container">
        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Main Content -->
        <main class="main-content">
            <h2 class="dashboard-title">Tableau de bord</h2>
        </main>
           
</body>
</html>
