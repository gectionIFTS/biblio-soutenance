<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Documents</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: rgb(255, 255, 255);
        }
        .navbar-container { }
        .content-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }
        h1 {
            color: #2b6cb0;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 1.5rem;
            text-align: left;
        }
        th {
            background-color: #2b6cb0;
            color: white;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f7fafc;
        }
        tr:hover {
            background-color: #ebf8ff;
        }
        .btn-view {
            background-color: #2b6cb0;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .btn-delete {
            background-color: #e62424d2;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .btn-view:hover {
            background-color: #2c5282;
        }
        .pagin {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .filter-container {
            margin-bottom: 10px;
        }

        /* Amélioration des boutons Modifier et Télécharger */
        .see {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background-color: #4a90e2;
            color: white !important;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .see i {
            margin-right: 0.3rem;
        }

        .see:hover {
            background-color: #357ABD;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="navbar-container">
        @include('layouts.navigation')
    </div>

    <div class="container ">
        @include('layouts.sidebar') 
        <div class="main-content">
            <h1 class="text-center text-3xl font-bold mb-6 uppercase tracking-wide">
                <i class="fas fa-users mr-2"></i>Liste des Documents
            </h1>
            <div class="filter-container">
                <form method="GET" action="/documentsall" class="flex flex-wrap gap-4">
                    <input type="text" name="search" placeholder="Rechercher d'un document..." class="border p-2 rounded w-full md:w-1/3" value="{{ request('search') }}">
                    <select name="filiere" class="border p-2 rounded w-full md:w-1/4">
                        <option value="">Toutes les filières</option>
                        <option value="genie-electrique" {{ request('filiere') == 'genie-electrique' ? 'selected' : '' }}>Génie électrique</option>
                        <option value="genie-civil" {{ request('filiere') == 'genie-civil' ? 'selected' : '' }}>Génie civil</option>
                    </select>
                    <input type="text" name="directeur" placeholder="Nom du directeur" class="border p-2 rounded w-full md:w-1/4" value="{{ request('directeur') }}">
    
                    <button type="submit" class="btn-view text-white px-4 py-2 rounded-lg hover:bg-blue-700">Rechercher</button>
                    <a href="/documentsall" class="btn-view px-4 py-2 rounded-lg hover:bg-gray-400">Actualiser</a>
                </form>
            </div>
    
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>directeur</th>
                            <th>Photos</th>
                            <th colspan="3" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                            <tr>
                                <td>{{ $document->titre }}</td>
                                <td>{{ $document->directeur }}</td>
                                <td>
                                    @if($document->photo)
                                    <img src="{{ Storage::url($document->photo) }}" 
                                         alt="Photo de {{ $document->titre }}" 
                                         class="object-cover rounded-md border border-gray-300" width="100">
                                    @else
                                        <span class="text-gray-500">❌ Pas de photo</span>
                                    @endif
                                </td>
                               
                                <td class="flex justify-between">
                                    <button type="button" onclick="openModal({{ $document->id }})" class="btn-delete">
                                        <i class="fas fa-trash-alt mr-2"></i>Supprimer
                                    </button>
                                </td>
                                <td>
                                    <a href="{{ route('documents.edit', $document->id) }}" class="see">
                                        <i class="fas fa-edit"></i>Modifier 
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ Storage::url($document->chemin_fichier) }}" class="see" download>
                                        <i class="fas fa-download"></i>Télécharger
                                    </a>
                                </td>
                            </tr>
                    
                            <div id="popup-modal-{{ $document->id }}" class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Voulez-vous vraiment supprimer le document {{ $document->titre }} ?
                                    </h3>
                                   
                                    <div class="mt-4 flex justify-end space-x-4">
                                        <form method="POST" action="{{ route('documents.destroy', $document->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-800">Oui, je suis sûr</button>
                                        </form>
                                        <button type="button" onclick="closeModal({{ $document->id }})" class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <div class="pagin">
                {{ $documents->links() }}
            </div>    
            <div class="flex justify-end">
                <a href="{{ route('adminDashboard') }}" class="btn-view">
                    Retour
                </a>
            </div>
        </div>
    </div>

    <script>
        function openModal(id) {
            document.getElementById('popup-modal-' + id).classList.remove('hidden');
        }
    
        function closeModal(id) {
            document.getElementById('popup-modal-' + id).classList.add('hidden');
        }
    </script>
    
</body>
</html>
