
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <style>
        .chart-container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }
        .card{
            transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Animation fluide */
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre douce */
            background-color: #fff;
        }
        .card:hover{
            background-color: #1577e644
        }
        .dashboard-grid {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
    </style>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/styles.css')); ?>">
    <script src="https://kit.fontawesome.com/YOUR_KIT_CODE.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <div class="navbar-container fixedr">
        <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="container">
        <!-- Sidebar -->
        <?php echo $__env->make('layouts.userSidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main Content -->
        <main class="main-content">
            <h2 class="dashboard-title">Tableau de bord</h2>

            <!-- Dashboard Stats -->
            <div class="dashboard-grid">
                <a class="card" >
                    
                    <div>
                        <p class="stat-title"></p>
                        <p class="stat-value"></p>
                    </div>
                </a>

                <a class="card" >
                    
                    <div>
                        <p class="stat-title"></p>
                        <p class="stat-value"></p>
                    </div>
                </a>

                <a class="card">
                   
                    <div>
                        <p class="stat-title"></p>
                        <p class="stat-value"></p>
                    </div>
                </a>
            </div>

            <!-- Graphique Multi-courbe -->
            <div class="chart-container">
                <canvas id="multiLineChart"></canvas>
            </div>
        </main>
    </div>

    <script>
    
    </script>
</body>
</html>
<?php /**PATH C:\Users\SENMOSDEV\Documents\carlos\gestiondoc6\resources\views/userDashboard.blade.php ENDPATH**/ ?>