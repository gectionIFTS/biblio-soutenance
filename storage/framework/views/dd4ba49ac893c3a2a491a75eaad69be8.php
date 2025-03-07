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
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main Content -->
        <main class="main-content">
            <h2 class="dashboard-title">Tableau de bord</h2>

            <!-- Dashboard Stats -->
            <div class="dashboard-grid">
                <a class="card" href="<?php echo e(route('documents.index')); ?>">
                    <i class="fas fa-file-alt icon blue"></i>
                    <div>
                        <p class="stat-title">Documents</p>
                        <p class="stat-value"><?php echo e($totalDocuments); ?></p>
                    </div>
                </a>

                <a class="card" href="<?php echo e(route('etudiants.index')); ?>">
                    <i class="fas fa-users icon green"></i>
                    <div>
                        <p class="stat-title">Étudiants</p>
                        <p class="stat-value"><?php echo e($totalEtudiants); ?></p>
                    </div>
                </a>

                <a class="card" href="<?php echo e(route('demandes.index')); ?>">
                    <i class="fas fa-book-reader icon yellow"></i>
                    <div>
                        <p class="stat-title">Demandes de lecture</p>
                        <p class="stat-value"><?php echo e($totalDemandes); ?></p>
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
        // Configuration du graphique multi-courbe
        var ctx = document.getElementById('multiLineChart').getContext('2d');
        var multiLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(range(1, 12), 512) ?>, // Mois de 1 à 12
                datasets: [
                    {
                        label: 'Documents par mois',
                        data: <?php echo json_encode($documentsParMois, 15, 512) ?>, // Données des documents par mois
                        borderColor: 'blue',
                        backgroundColor: 'rgba(0, 0, 255, 0.1)',
                        fill: true,
                        lineTension: 0.4,  // Ajouter une courbe lisse
                    },
                    {
                        label: 'Étudiants par mois',
                        data: <?php echo json_encode($etudiantsParMois, 15, 512) ?>, // Données des étudiants par mois
                        borderColor: 'green',
                        backgroundColor: 'rgba(0, 255, 0, 0.1)',
                        fill: true,
                        lineTension: 0.4,  // Ajouter une courbe lisse
                    },
                    {
                        label: 'Demandes de lecture par mois',
                        data: <?php echo json_encode($demandesParMois, 15, 512) ?>, // Données des demandes par mois
                        borderColor: 'yellow',
                        backgroundColor: 'rgba(255, 255, 0, 0.1)',
                        fill: true,
                        lineTension: 0.4,  // Ajouter une courbe lisse
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top', // Position de la légende
                    },
                    tooltip: {
                        mode: 'index', // Affichage du tooltip
                        intersect: false,
                    },
                },
                scales: {
                    x: { 
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Mois'
                        }
                    },
                    y: { 
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Nombre'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\SENMOSDEV\Documents\carlos\gestiondoc6\resources\views/adminDashboard.blade.php ENDPATH**/ ?>