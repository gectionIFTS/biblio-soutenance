<aside class="sidebar">
    <h1 class="title">Bibliothèque</h1>
    <nav class="nav">
        <a href="<?php echo e(route('userDashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('userDashboard') ? 'active' : ''); ?>">
            <i class="fas fa-home"></i> <span>Dashboard</span>
        </a>
        <a href="<?php echo e(route('user_documents_view')); ?>" class="nav-link <?php echo e(request()->routeIs('user_documents_view') ? 'active' : ''); ?>">
            <i class="fas fa-home"></i> <span>Consultation des documents</span>
        </a>
        <a href="<?php echo e(route('demandes.list')); ?>" class="nav-link <?php echo e(request()->routeIs('documents.create') ? 'active' : ''); ?>">
            <i class="fas fa-upload"></i> <span>mes demandes de lectures</span>
        </a>
       
    </nav>
</aside>
<?php /**PATH C:\Users\carlo\Desktop\ETUDE ET CONCEOTION D'UN LOGICIEL DE GESTION DE LA BIBLIOTHEQUE DE L'IFTS\CONSPTION\Nouveau dossier\bibliotogo\resources\views/layouts/userSidebar.blade.php ENDPATH**/ ?>