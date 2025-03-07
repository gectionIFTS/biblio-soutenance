<aside class="sidebar">
    <h1 class="title">Bibliothèque</h1>
    <nav class="nav">
        <a href="{{ route('adminDashboard') }}" class="nav-link {{ request()->routeIs('adminDashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> <span>Dashboard</span>
        </a>
        <a href="{{ route('documents.create') }}" class="nav-link {{ request()->routeIs('documents.create') ? 'active' : '' }}">
            <i class="fas fa-upload"></i> <span>Dépôt des documents</span>
        </a>
        <a href="{{ route('documents.index') }}" class="nav-link {{ request()->routeIs('documents.index') ? 'active' : '' }}">
            <i class="fas fa-file-alt"></i> <span>Liste des documents</span>
        </a>
        <a href="{{ route('etudiants.index') }}" class="nav-link {{ request()->routeIs('etudiants.index') ? 'active' : '' }}">
            <i class="fas fa-users"></i> <span>Liste des étudiants</span>
        </a>
        <a href="{{ route('demandes.index') }}" class="nav-link {{ request()->routeIs('demandes.index') ? 'active' : '' }}">
            <i class="fas fa-book"></i> <span>Demandes de lecture</span>
        </a>
        <a href="{{ route('imports.index') }}" class="nav-link {{ request()->routeIs('imports.index') ? 'active' : '' }}">
            <i class="fas fa-book"></i> <span>Importations</span>
        </a>
    </nav>
</aside>
