<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Étudiants</title>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"> 
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: rgb(255, 255, 255);
        }
        .navbar-container {
            
        }
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
        .filter-container{
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar-container">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="container ">
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <div class="main-content">
            <h1 class="text-center text-3xl font-bold mb-6 uppercase tracking-wide">
                <i class="fas fa-users mr-2"></i>Liste des Étudiants
            </h1>
            <div class="filter-container">
                <form method="GET" action="<?php echo e(route('etudiants.index')); ?>" class="flex flex-wrap gap-4">
                    <input type="text" name="search" placeholder="Rechercher un étudiant..." class="border p-2 rounded w-full md:w-1/3" value="<?php echo e(request('search')); ?>">
                    <select name="filiere" class="border p-2 rounded w-full md:w-1/4">
                        <option value="">Toutes les filières</option>
                        <option value="genie-electrique" <?php echo e(request('filiere') == 'genie-electrique' ? 'selected' : ''); ?>>Génie électrique</option>
                        <option value="genie-civil" <?php echo e(request('filiere') == 'genie-civil' ? 'selected' : ''); ?>>Génie civil</option>
                    </select>
                    
    
                    <button type="submit" class="btn-view text-white px-4 py-2 rounded-lg hover:bg-blue-700">Rechercher</button>
                    <a href="<?php echo e(route('etudiants.index')); ?>" class="btn-view px-4 py-2 rounded-lg hover:bg-gray-400">Actualiser</a>
                </form>
                
            </div>
    
            <div class="overflow-x-auto">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Matricule</th>
                            <th>Nom</th>
                            <th>Prenoms</th>
                            <th>Email</th>
                            <th>Filière</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $etudiants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etudiant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($etudiant->matricule); ?></td>
                                <td><?php echo e($etudiant->name); ?></td>
                                <td><?php echo e($etudiant->firstname); ?></td>
                                <td><?php echo e($etudiant->email); ?></td>
                                <td><?php echo e($etudiant->filiere); ?></td>
                                <td class="flex justify-between">
                                    <button type="button" onclick="openModal(<?php echo e($etudiant->id); ?>)" class="btn-delete">
                                        <i class="fas fa-trash-alt mr-2"></i>Supprimer
                                    </button>
                                </td>
                            </tr>
                    
                            <!-- Modal pour chaque étudiant -->
                            <div id="popup-modal-<?php echo e($etudiant->id); ?>" class="hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full h-full bg-gray-900 bg-opacity-50">
                                <div class="bg-white rounded-lg shadow-lg p-6 w-96">
                                    <h3 class="text-lg font-semibold text-gray-900">
                                        Voulez-vous vraiment supprimer l'étudiant <?php echo e($etudiant->name); ?> ?
                                    </h3>
                                    <p class="text-sm text-gray-500 mt-2">
                                        Toutes ses demandes de lecture et autres données associées seront supprimées définitivement.
                                    </p>
                                    <div class="mt-4 flex justify-end space-x-4">
                                        <form method="POST" action="<?php echo e(route('etudiants.destroy', $etudiant->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-800">Oui, je suis sûr</button>
                                        </form>
                                        <button type="button" onclick="closeModal(<?php echo e($etudiant->id); ?>)" class="bg-gray-300 px-4 py-2 rounded-lg hover:bg-gray-400">Annuler</button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    
                </table>
                
            </div>
            
        <div class="pagin">
            <?php echo e($etudiants->links()); ?>

        </div>
        <div class=" flex justify-end">
            <a href="<?php echo e(route('adminDashboard')); ?>" class="btn-view" style="">
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
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\bibliotogo\resources\views/etudiants/index.blade.php ENDPATH**/ ?>