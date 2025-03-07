<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation des Documents</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        .doc-card {
            width: 100%;
            display: flex;
            flex-direction: column;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(91, 91, 92, 0.537);
            transition: transform 0.3s ease;
            padding: 10px;
        }
        .doc-card:hover {
            transform: scale(1.02);
        }
        .doc-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }
        body {
            font-family: 'Figtree', sans-serif;
            background-color: rgb(243, 243, 243);
            color: #161616;
        }
        .navbar-container {
            background-color: white;
            padding: 15px 25px;
            box-shadow: 0 4px 12px rgba(27, 12, 242, 0.9);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }
        .content-container {
            margin-top: 120px;
            max-width: 1222px;
            margin-left: auto;
            margin-right: auto;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 20px;
        }
        @media (min-width: 640px) {
            .grid-container { grid-template-columns: repeat(2, 1fr); }
        }
        @media (min-width: 768px) {
            .grid-container { grid-template-columns: repeat(3, 1fr); }
        }
        @media (min-width: 1024px) {
            .grid-container { grid-template-columns: repeat(6, 1fr); }
        }

        /* Style du conteneur de filtre */
        .filter-container {
            margin: 2rem 0;
            padding: 1.5rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .filter-container input,
        .filter-container select {
            padding: 0.75rem;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-bottom: 1rem;
        }
        .filter-container button,
        .filter-container a {
            padding: 0.75rem 1.25rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }
        .btn-search {
            background-color: #2563EB;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-search:hover {
            background-color: #1D4ED8;
        }
        .btn-refresh {
            background-color: rgb(14, 41, 78);
            color: white;
            border: none;
            transition: background-color 0.3s ease;
        }
        .btn-refresh:hover {
            background-color: rgba(8, 36, 91, 0.75);
        }
        
        /* Bouton Retour */
        .btn-return {
            padding: 10px 20px;
            background-color: rgb(14, 41, 78);
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            position: fixed;
            bottom: 0;
            right: 2rem;
            z-index: 999;
        }
        .btn-return:hover {
            background-color: rgba(8, 36, 91, 0.75);
        }
        .read{
            background-color: #1D4ED8;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="navbar-container">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="content-container m-6">
        <div class="filter-container">
            <form method="GET" action="/documentss" class="flex flex-wrap gap-4">
                <input type="text" name="search" placeholder="Rechercher un document..." class="border p-2 rounded w-full md:w-1/3" value="<?php echo e(request('search')); ?>">
                <select name="filiere" class="border p-2 rounded w-full md:w-1/4">
                    <option value="">Toutes les filières</option>
                    <option value="genie-electrique" <?php echo e(request('filiere') == 'genie-electrique' ? 'selected' : ''); ?>>Génie électrique</option>
                    <option value="genie-civil" <?php echo e(request('filiere') == 'genie-civil' ? 'selected' : ''); ?>>Génie civil</option>
                </select>
                <input type="text" name="directeur" placeholder="Nom du directeur" class="border p-2 rounded w-full md:w-1/4" value="<?php echo e(request('directeur')); ?>">
                <input type="text" name="annee" placeholder="Année" class="border p-2 rounded w-full md:w-1/4" value="<?php echo e(request('annee')); ?>">
                <button type="submit" class="btn-search">Rechercher</button>
                <a href="/documentss" class="btn-refresh">Actualiser</a>
            </form>
        </div>

        <h1 class="text-center text-xl font-bold text-blue-600 mb-6 uppercase">
            CONSULTATION DES DOCUMENTS
        </h1>

        <div class="grid-container">
          
            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="doc-card">
                    <a href="<?php echo e(route('documentss.show', $document->id)); ?>">
                        <img class="object-cover w-full h-48 bg-gray-300"
                             src="<?php echo e($document->photo ? Storage::url($document->photo) : '/default-image.jpg'); ?>"
                             alt="<?php echo e($document->titre); ?>">
                    </a>
                    <div class="p-5">
                        <h5 class="text-xl font-bold text-gray-900"><?php echo e($document->titre); ?></h5>
                        <h3 class="text-lg font-semibold text-gray-800"><?php echo e($document->directeur); ?></h3>
                        <p class="text-gray-700"><?php echo e(Str::limit($document->description, 20, '...')); ?></p>
                        <div class="flex justify-between">
                            <a href="<?php echo e(route('documentss.show', $document->id)); ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition-colors">
                                Voir plus
                             </a>
                           
                             <?php if($document->estApprouvePourUtilisateur(auth()->id()) || auth()->user()->matricule): ?>
                             <a href="<?php echo e(route('documents.lecture', $document->id)); ?>" 
                                class="inline-flex items-center px-4 py-2 text-sm text-white font-medium read">
                                 Lire
                             </a>
                         <?php endif; ?>
                         
                         
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="mt-6 flex justify-center">
            <?php echo e($documents->links()); ?>

        </div>
    </div>

    <a href="<?php echo e(route('userDashboard')); ?>" class="btn-return">Retour</a>
</body>
</html>
<?php /**PATH C:\Users\SENMOSDEV\Documents\carlos\gestiondoc6\resources\views/layouts/documents/index2.blade.php ENDPATH**/ ?>