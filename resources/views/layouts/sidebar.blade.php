<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item" id="dashboard">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    @can('user')
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item" id="news">
            <a class="nav-link" href="{{ route('front') }}">
                <i class="fas fa-fw fa-home"></i>
                <span>Nyheder</span>
            </a>
        </li>

        <li class="nav-item" id="actions">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                aria-controls="collapsePages">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Handlinger</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Handlinger</h6>
                    <a class="collapse-item" id="advert" href="{{ route('advert.index')}}">Reklame indstillinger</a>
                    <a class="collapse-item" href="register.html">Filter indstillinger</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    @endcan


    @can('admin')
        <!-- Heading -->
        <div class="sidebar-heading">
            Admin indstillinger
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item" id="admin">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true"
                aria-controls="collapseAdmin">
                <i class="fas fa-fw fa-cogs"></i>
                <span>Admin indstillinger</span>
            </a>
            <div id="collapseAdmin" class="collapse" aria-labelledby="headingAdmin" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Admin indstillinger:</h6>
                    <a class="collapse-item" id="user" href="{{ route('users.index') }}">Bruger indstillinger</a>
                    <a class="collapse-item" id="role" href="{{ route('roles.index') }}">Rolle indstillinger</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    @endcan


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    @if (Config::get('app.env') != 'production')
        <div class="alert alert-warning" style="font-size: 80%;" role="alert">
            Development Env
        </div>
    @endif
</ul>
<!-- End of Sidebar -->
