<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Document de Soutenance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color:rgba(90, 88, 88, 0.68);
        }
        .content {
            position: relative;
            background: rgb(255, 255, 255);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgb(0, 0, 0, 0.1);
        }
        input, textarea, select {
            background-color: rgba(0, 44, 189, 0.31);
            border: 1px solid rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body class="flex justify-center items-center min-h-screen p-4">
    <div class="content w-full max-w-3xl">
    <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
        <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">✏️ Modifier un Document de Soutenance</h2>

        <form action="{{ route('documents.update', $document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="titre" class="block text-sm font-semibold text-gray-700">📌 Titre du document</label>
                    <input type="text" id="titre" name="titre" value="{{ $document->titre }}" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                </div>
                <div>
                    <label for="auteur" class="block text-sm font-semibold text-gray-700">✍️ Auteur</label>
                    <input type="text" id="auteur" name="auteur" value="{{ $document->auteur }}" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                </div>
                <div>
                    <label for="annee" class="block text-sm font-semibold text-gray-700">📅 Année de soutenance</label>
                    <input type="number" id="annee" name="annee" min="1900" value="{{ $document->annee }}" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                </div>
                <div>
                    <label for="directeur" class="block text-sm font-semibold text-gray-700">Directeur de mémoire</label>
                    <input type="text" id="directeur" name="directeur" value="{{ $document->directeur }}" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                </div>
                <div>
                    <label for="filiere" class="block text-sm font-semibold text-gray-700">🎓 Filière</label>
                    <select id="filiere" name="filiere" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                        <option value="genie-electrique" {{ $document->filiere == 'genie-electrique' ? 'selected' : '' }}>Génie électrique</option>
                        <option value="genie-civil" {{ $document->filiere == 'genie-civil' ? 'selected' : '' }}>Génie civil</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-semibold text-gray-700">📝 Description</label>
                    <textarea id="description" name="description" rows="4" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>{{ $document->description }}</textarea>
                </div>
                <div>
                    <label for="document" class="block text-sm font-semibold text-gray-700">📂 Remplacer le document</label>
                    <input type="file" id="document" name="document" accept=".pdf,.doc,.docx,.txt" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                </div>
                <div>
                    <label for="photo" class="block text-sm font-semibold text-gray-700">📷 Remplacer la photo (optionnel)</label>
                    <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                </div>
            </div>
            <button type="submit" class="mt-6 bg-indigo-600 text-white py-3 px-6 rounded-xl shadow-lg hover:bg-indigo-700 transition-all w-full text-lg font-semibold">
                💾 Mettre à jour
            </button>
        </form>
        <div class="fixed bottom-4 right-4">
            <button onclick="window.history.back()" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-700 transition">
                ⬅ Retour
            </button>
        </div>
    </div>
</body>
</html>
