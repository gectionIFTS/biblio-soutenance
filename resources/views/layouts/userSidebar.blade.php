<aside class="sidebar">
    <h1 class="title">Bibliothèque</h1>
    <nav class="nav">
        <a href="{{ route('userDashboard') }}" class="nav-link {{ request()->routeIs('userDashboard') ? 'active' : '' }}">
            <i class="fas fa-home"></i> <span>Dashboard</span>
        </a>
        <a href="{{ route('user_documents_view') }}" class="nav-link {{ request()->routeIs('user_documents_view') ? 'active' : '' }}">
            <i class="fas fa-home"></i> <span>Consultation des documents</span>
        </a>
        <a href="{{ route('demandes.list') }}" class="nav-link {{ request()->routeIs('documents.create') ? 'active' : '' }}">
            <i class="fas fa-upload"></i> <span>mes demandes de lectures</span>
        </a>
       
    </nav>
</aside>
