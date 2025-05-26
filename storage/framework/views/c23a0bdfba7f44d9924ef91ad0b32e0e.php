<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déposer un Document de Soutenance</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script> 
</style>
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"> 
<style>
    .btn-vali{
        transition: all 100ms  ease-in-out;
        background-color: rgb(47, 98, 175);
        border-radius: 4px;
        padding: 10px;
        color: white;
    }
    .btn-vali:hover{
        background-color: #387bc2
    }
    .btn-view {
            background-color: #2b6cb0;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            margin-top: 10px;
         
        }
    .btn-view:hover{
        background-color: #4985c5;
    }

</style>
<script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script> 
</head>
<body>
    
    <div class="navbar-containe fixedr">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="container">
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

        <main class="main-content">
            <h2 class="dashboard-title">📄 Déposer un Document de Soutenance</h2>

            <div class="content w-full max-w-3xl">
                <div>
                            
                        </div>
                  
                    <form action="<?php echo e(route('documents.store')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="titre" class="block text-sm font-semibold text-gray-700">📌 Titre du document</label>
                                <input type="text" id="titre" name="titre" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                            </div>
                            <div>
                                <label for="auteur" class="block text-sm font-semibold text-gray-700">✍️ Auteur</label>
                                <input type="text" id="auteur" name="auteur" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                            </div>
                            <div>
                                <label for="annee" class="block text-sm font-semibold text-gray-700">📅 Année de soutenance</label>
                                <input type="number" id="annee" name="annee" min="1900" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                            </div>
                             <div>
                                <label for="directeur" class="block text-sm font-semibold text-gray-700">Directeur de mémoire</label>
                                <input type="text" id="directeur" name="directeur" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                            </div>
                            <div>
                                <label for="filiere" class="block text-sm font-semibold text-gray-700">🎓 Filière</label>
                                <select id="filiere" name="filiere" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                                    <option value="genie-electrique">Génie électrique</option>
                                    <option value="genie-civil">Génie civil</option>
                                </select>
                            </div>
                            <div class="md:col-span-2">
                                <label for="description" class="block text-sm font-semibold text-gray-700">📝 Description</label>
                                <textarea id="description" name="description" rows="4" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required></textarea>
                            </div>
                            <div>
                                <label for="document" class="block text-sm font-semibold text-gray-700">📂 Télécharger le document</label>
                                <input type="file" id="document" name="document" accept=".pdf,.doc,.docx,.txt" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all" required>
                            </div>
                            <div>
                                <label for="photo" class="block text-sm font-semibold text-gray-700">📷 Télécharger une photo (optionnel)</label>
                                <input type="file" id="photo" name="photo" accept=".jpg,.jpeg,.png" class="mt-2 w-full border border-gray-300 rounded-xl p-3 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition-all">
                            </div>
                        </div>
                        <button type="submit" class=" btn-vali mt-6 bg-indigo-600 w-full text-lg font-semibold">
                            📤 Déposer
                        </button>
                    </form>
                    <div class="fixed bottom-4 right-4">
                    <button onclick="window.history.back()" class="btn-view  text-white px-4 py-2 rounded-lg shadow-lg hover:bg-blue-700 transition">
                        ⬅ Retour
                    </button>
                </div>
                </div>
            
        </main>
    </div>

</body>
</html>
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\Nouveau dossier\bibliotogo\resources\views/layouts/depot.blade.php ENDPATH**/ ?>