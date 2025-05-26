<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes de Lecture</title>

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: rgb(255, 255, 255);
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

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn-accept,
        .btn-reject,
        .btn-att,
        .btn-view,
        .see,
        .retour,
        .btn-return-fixed,
        .read {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            border: none;
            text-decoration: none;
            transition: all 0.2s ease-in-out;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-accept { background-color: #38a169; color: white; }
        .btn-accept:hover { background-color: #2f855a; }

        .btn-reject { background-color: #e53e3e; color: white; }
        .btn-reject:hover { background-color: #c53030; }

        .btn-att { background-color: #d69e2e; color: white; }
        .btn-att:hover { background-color: #b7791f; }

        .btn-view { background-color: #3182ce; color: white; }
        .btn-view:hover { background-color: #2b6cb0; }

        .see { background-color: #2b6cb0; color: white; }
        .see:hover { background-color: #1a436b; }

        .read { background-color: #4c51bf; color: white; }
        .read:hover { background-color: #434190; }

        .retour {
            background-color: #2b6cb0;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            color: white;
            font-size: 1rem;
        }
        .retour:hover { background-color: #1a436b; }

        .btn-return-fixed {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #2b6cb0;
            color: white;
        }
        .btn-return-fixed:hover { background-color: #2c5282; }

        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .alert-success { background-color: #d4edda; color: #155724; }
        .alert-danger { background-color: #f8d7da; color: #721c24; }

        .pagin {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .filter-container input,
        .filter-container button,
        .filter-container a {
            border-radius: 6px;
        }
    </style>
</head>
<body>
    <div class="navbar-container">
        @include('layouts.navigation')
    </div>

    <div class="container">
        @include("layouts.userSidebar")
        <div class="main-content">
            <h1 class="text-center text-3xl font-bold mb-6 uppercase tracking-wide">
                <i class="fas fa-book-reader mr-2"></i>GESTION DES DEMANDES DE LECTURE
            </h1>

            @if(session('success'))
                <div id="success-message" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div id="error-message" class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="filter-container">
                <form method="GET" action="{{ route('demandes.list') }}" class="flex flex-wrap gap-4 mb-4">
                    <input type="text" name="search" placeholder="Rechercher un étudiant..." class="border p-2 rounded w-full md:w-1/3" value="{{ request('search') }}">
                    <input type="text" name="document" placeholder="Rechercher un document..." class="border p-2 rounded w-full md:w-1/3" value="{{ request('document') }}">
                    <button type="submit" class="btn-view">Rechercher</button>
                    <a href="{{ route('demandes.list') }}" class="btn-view bg-gray-300 hover:bg-gray-400">Actualiser</a>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Document</th>
                            <th>Statut</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($demandes as $demande)
                        <tr>
                            <td>{{$demande->documents->titre ?? 'Document inconnu' }}</td>
                            <td>
                                @if($demande->statut ==='approuvee')
                                    <span class="status btn-accept">{{ ucfirst($demande->statut) }}</span>
                                @elseif($demande->statut ==="refusee")
                                    <span class="status btn-reject">{{ ucfirst($demande->statut) }}</span>
                                @elseif($demande->statut ==="attente")
                                    <span class="status btn-att">{{ ucfirst($demande->statut) }}</span>
                                @endif
                            </td>
                            <td style="display: flex; flex-direction: column; align-items: center; gap: 10px;">
                                <a href="{{ route('document', $demande->document_id) }}" class="see" style="width: max-content;">
                                    <i class="fas fa-eye"></i> Voir le document
                                </a>

                                @if ($demande->documents->estApprouvePourUtilisateur(auth()->id()))
                                <a href="{{ route('documents.lecture', $demande->document_id) }}" class="read" style="width: max-content;">
                                    <i class="fas fa-book-open"></i> Lire
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="pagin">
                {{ $demandes->links() }}
            </div>

            <div class="flex justify-end">
                <a href="{{ route('adminDashboard') }}" class="retour">Retour</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');

            function hideMessage(element) {
                setTimeout(() => {
                    if (element) {
                        element.style.display = 'none';
                    }
                }, 3000);
            }

            if (successMessage) hideMessage(successMessage);
            if (errorMessage) hideMessage(errorMessage);
        });
    </script>
</body>
</html>
