<aside class="sidebar">
    <h1 class="title">Bibliothèque</h1>
    <nav class="nav">
        <a href="<?php echo e(route('adminDashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('adminDashboard') ? 'active' : ''); ?>">
            <i class="fas fa-home"></i> <span>Dashboard</span>
        </a>
        <a href="<?php echo e(route('documents.create')); ?>" class="nav-link <?php echo e(request()->routeIs('documents.create') ? 'active' : ''); ?>">
            <i class="fas fa-upload"></i> <span>Dépôt des documents</span>
        </a>
        <a href="<?php echo e(route('documents.index')); ?>" class="nav-link <?php echo e(request()->routeIs('documents.index') ? 'active' : ''); ?>">
            <i class="fas fa-file-alt"></i> <span>Liste des documents</span>
        </a>
        <a href="<?php echo e(route('etudiants.index')); ?>" class="nav-link <?php echo e(request()->routeIs('etudiants.index') ? 'active' : ''); ?>">
            <i class="fas fa-users"></i> <span>Liste des étudiants</span>
        </a>
        <a href="<?php echo e(route('demandes.index')); ?>" class="nav-link <?php echo e(request()->routeIs('demandes.index') ? 'active' : ''); ?>">
            <i class="fas fa-book"></i> <span>Demandes de lecture</span>
        </a>
        <a href="<?php echo e(route('imports.index')); ?>" class="nav-link <?php echo e(request()->routeIs('imports.index') ? 'active' : ''); ?>">
            <i class="fas fa-book"></i> <span>Importations</span>
        </a>
    </nav>
</aside>
<?php /**PATH C:\Users\SENMOSDEV\Documents\carlos\gestiondoc6\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>