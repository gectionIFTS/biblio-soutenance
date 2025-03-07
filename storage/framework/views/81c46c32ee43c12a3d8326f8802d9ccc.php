<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes de Lecture</title>

    <!-- Fonts & Styles -->

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>"> 
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script> 
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color:rgb(255, 255, 255);
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
        .actions {
            display: flex;
            gap: 10px;
        }
        .btn-accept {
            background-color: #48bb78;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
       
        .btn-reject {
            background-color: #f56565;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
        .btn-reject:hover {
            background-color: #e53e3e;
        }
        .btn-return-fixed {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #2b6cb0;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn-return-fixed:hover {
            background-color: #2c5282;
        }

        /* Style pour les messages flash */
        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .pagin{
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }
        .retour{
            background-color: #125fa7;
            padding: 15px;
            border-radius: 10px;
            color: white;
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
        .see{
            background-color: #2b6cb0;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        
        }
        .see:hover{
            background-color: #0a3f70;
        }
        .btn-att{
            background-color: #e0ac33;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            border: none;
            cursor: pointer;
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
            <i class="fas fa-book-reader mr-2"></i>GESTION DES DEMANDES DE LECTURE
        </h1>

        <!-- Affichage du message de succès -->
        <?php if(session('success')): ?>
            <div id="success-message" class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Affichage du message d'erreur si présent -->
        <?php if(session('error')): ?>
            <div id="error-message" class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <div class="filter-container">
            <form method="GET" action="<?php echo e(route('demandes.index')); ?>" class="flex flex-wrap gap-4 mb-4">
                <input type="text" name="search" placeholder="Rechercher un étudiant..." 
                    class="border p-2 rounded w-full md:w-1/3" 
                    value="<?php echo e(request('search')); ?>">
                <input type="text" name="document" placeholder="Rechercher un document..." 
                    class="border p-2 rounded w-full md:w-1/3" 
                    value="<?php echo e(request('document')); ?>">
                <select name="filiere" class="border p-2 rounded w-full md:w-1/4">
                    <option value="">Toutes les filières</option>
                    <option value="genie-electrique" <?php echo e(request('filiere') == 'genie-electrique' ? 'selected' : ''); ?>>Génie électrique</option>
                    <option value="genie-civil" <?php echo e(request('filiere') == 'genie-civil' ? 'selected' : ''); ?>>Génie civil</option>
                </select>
        
                <button type="submit" class="btn-view text-white px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-700">Rechercher</button>
                <a href="<?php echo e(route('demandes.index')); ?>" class="btn-view px-4 py-2 rounded-lg bg-gray-300 hover:bg-gray-400">Actualiser</a>
            </form>
        </div> 
        <div class="overflow-x-auto">
            <form id="bulk-actions-form" method="POST" action="<?php echo e(route('demandes.bulk-action')); ?>">
                <?php echo csrf_field(); ?>
                <div class="mb-4 flex justify-between">
                    <div>
                        <button type="submit" name="action" value="accepter" class="btn-accept">
                            <i class="fas fa-check mr-2"></i> Accepter Sélectionnées
                        </button>
                        <button type="submit" name="action" value="refuser" class="btn-reject">
                            <i class="fas fa-times mr-2"></i> Refuser Sélectionnées
                        </button>
                    </div>
                </div>
              
                
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>  <!-- Case pour tout sélectionner -->
                            <th>Étudiant</th>
                            <th>Document</th>
                            <th>Directeur</th>
                            <th>Statut</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $demandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><input type="checkbox" name="demandes[]" value="<?php echo e($demande->id); ?>" class="select-item"></td> <!-- Case à cocher pour chaque ligne -->
                                <td><?php echo e($demande->etudiant->name); ?></td>
                                <td><?php echo e($demande->documents->titre); ?></td>
                                <td><?php echo e($demande->documents->directeur); ?></td>
                                <td>
                                    <?php if($demande->statut ==='approuvee'): ?>
                                        <span class="status btn-accept <?php echo e($demande->statut); ?>">
                                             <?php echo e(ucfirst($demande->statut)); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if($demande->statut ==="refusee"): ?>
                                        <span class="status btn-reject <?php echo e($demande->statut); ?>">
                                             <?php echo e(ucfirst($demande->statut)); ?>

                                        </span>
                                    <?php endif; ?>
                                    <?php if($demande->statut ==="attente"): ?>
                                    <span class="status btn-att <?php echo e($demande->statut); ?>">
                                         <?php echo e(ucfirst($demande->statut)); ?>

                                    </span>
                                    <?php endif; ?>
                                </td>
                                
                                <td>
                                    <a href="<?php echo e(route('documentshow', $demande->document_id)); ?>" class="see text-blue-500 hover:text-blue-700">
                                        <i class="fas fa-times mr-2"></i>Voir le document
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </form>
           
        </div>
        <div class="pagin">
        
            <?php echo e($demandes->links()); ?>

        </div>
        <div class="flex justify-end">
            <a href="<?php echo e(route('adminDashboard')); ?>" class="retour ">Retour</a>
        </div>

    </div>

   

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Vérifier si un message de succès ou d'erreur est présent
            const successMessage = document.getElementById('success-message');
            const errorMessage = document.getElementById('error-message');
            
            // Fonction pour masquer un message après 3 secondes
            function hideMessage(element) {
                setTimeout(function() {
                    if (element) {
                        element.style.display = 'none';
                    }
                }, 3000); // Masquer après 3 secondes
            }

            // Masquer les messages si présents
            if (successMessage) {
                hideMessage(successMessage);
            }
            if (errorMessage) {
                hideMessage(errorMessage);
            }
        });
        
    document.getElementById('select-all').addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('.select-item');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    </script>
</body>
</html>
<?php /**PATH C:\Users\SENMOSDEV\Documents\carlos\gestiondoc6\resources\views/demandes/index.blade.php ENDPATH**/ ?>