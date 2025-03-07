<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes de Lecture</title>

    <!-- Fonts & Styles -->
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
            margin-bottom: 2rem;
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
        .btn-accept:hover {
            background-color: #38a169;
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
    </style>
</head>
<body>
    <div class="navbar-container">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="content-container m-6">
        <h1 class="text-center text-3xl font-bold mb-6 uppercase tracking-wide">
            <i class="fas fa-book-reader mr-2"></i>GESTION DES DEMANDES DE LECTURE
        </h1>

        <?php if(session('success')): ?>
            <div class="bg-green-200 text-green-800 p-3 rounded mb-3">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Étudiant</th>
                        <th>Document</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $demandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($demande->etudiant->name); ?></td>
                            <td><?php echo e($demande->document->titre); ?></td>
                            <td>
                                <span class="status <?php echo e($demande->statut); ?>">
                                    <?php echo e(ucfirst($demande->statut)); ?>

                                </span>
                            </td>
                            <td>
                                <?php if($demande->statut === 'en attente'): ?>
                                    <div class="actions">
                                        <form action="<?php echo e(route('demandes.accepter', $demande->id)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn-accept">
                                                <i class="fas fa-check mr-2"></i>Accepter
                                            </button>
                                        </form>
                                        <form action="<?php echo e(route('demandes.refuser', $demande->id)); ?>" method="POST" class="inline">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn-reject">
                                                <i class="fas fa-times mr-2"></i>Refuser
                                            </button>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <span class="text-gray-500"><?php echo e(ucfirst($demande->statut)); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <a href="<?php echo e(route('adminDashboard')); ?>" class="btn-return-fixed">Retour</a>
</body>
</html>
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\gestiondoc5\gestiondoc5\resources\views/demandes/index.blade.php ENDPATH**/ ?>