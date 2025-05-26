<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <!-- Styles -->
    <style>
        /* Arrière-plan sans image */
        .background {
            min-height: 100vh;
            background-color:rgb(193, 192, 192); /* Couleur de fond simple */
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        /* Conteneur principal */
        .content-container {
            position: relative;
            z-index: 1;
            padding: 50px;
            background-color: rgba(53, 52, 52, 0.29);
            border-radius: 20px;
            box-shadow: 0 8px 15px rgb(0, 0, 0);
            width: 95%;
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 100px; /* Ajustement pour éviter l'overlap avec la navbar */
        }

        /* Navbar fixée en haut */
        .navbar-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: rgb(255, 255, 255); /* Couleur semi-transparente */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        /* Espacement du contenu pour ne pas être caché par le navbar */
        main {
            margin-top: 120px; /* Pour compenser la hauteur du navbar */
        }

        /* Typographie */
        body {
            font-family: 'Figtree', sans-serif;
            color: #333;
            line-height: 1.6;
        }

        h1, h2, h3 {
            font-family: 'Figtree', sans-serif;
            font-weight: 600;
            color: #333;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Navbar fixée -->
    <div class="navbar-container">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="background">
        <!-- Conteneur du contenu -->
        <div class="content-container">
            <!-- Page Content -->
            <main>
                <?php echo e($slot); ?>

            </main>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\bibliotogo\resources\views/layouts/app.blade.php ENDPATH**/ ?>