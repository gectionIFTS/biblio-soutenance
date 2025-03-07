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

    <style>.navbar-container {
            background-color: white;
            padding: 15px 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1000;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .content-container {
            margin-top: 100px !important;
            max-width: 500px;
            margin: auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            text-align: center;
        }
        h2 {
            font-size: 2.0rem;
            color: #0056b3;
        }
        .document-image {
            max-width: 100%;
             height: auto;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .document-details {
            background: #f1f1f1;
            padding: 20px;
            border-radius: 10px;
            margin-top: 15px;
        }
        .document-details p {
            margin: 10px 0;
            font-size: 1.1rem;
        }
        .btn-request {
            display: inline-flex;
            align-items: center;
            padding: 14px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.2rem;
            transition: background 0.3s, transform 0.2s;
            border: none;
            cursor: pointer;
        }
        .btn-request:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Style pour le bouton retour en bas à droite */
        .btn-return {
            position: fixed;
            bottom: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #4B5563;
            color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-return:hover {
            background-color: #6B7280;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar-container">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <!-- Contenu principal -->
    <div class="content-container">
        <h2>Consultation des Documents</h2>

        <img src="<?php echo e($document->photo ? Storage::url($document->photo) : '/default-image.jpg'); ?>" alt="Image du document" class="document-image bg-gray-500">
        <div class="document-details">
            <h1 class="text-3xl font-bold mb-4"><strong>Titre: </strong><?php echo e($document->titre); ?></h1>
            <p><strong>Description :</strong> <?php echo e($document->description); ?></p>
            <p><strong>Directeur :</strong> <?php echo e($document->directeur); ?></p>
        </div>

        <!-- Formulaire pour envoyer la demande de lecture -->
        <div class="mt-4">
            <form action="<?php echo e(route('demandes.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="document_id" value="<?php echo e($document->id); ?>">
                <button type="submit" class="btn-request">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m0 0L5 7m4-4l4 4"></path>
                    </svg>
                    Faire une demande de lecture
                </button>
            </form>
        </div>

        <!-- Message de confirmation -->
        <?php if(session('success')): ?>
            <div class="mt-4 p-3 bg-green-500 text-white rounded">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
    </div>

    <!-- Bouton retour en bas à droite -->
    <a href="javascript:history.back()" class="btn-return">
        Retour
    </a>
</body>
</html>
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\gestiondoc5\gestiondoc5\resources\views/layouts/documents/show.blade.php ENDPATH**/ ?>