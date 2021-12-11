<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    @if (Route::is('front') || Route::is('search'))
        <!-- Topbar - Brand -->
        <a class="d-flex align-items-center justify-content-center text-decoration-none" href="{{ route('front') }}">
            <div class="rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="d-sm-block d-none mx-3">{{ config('app.name') }}</div>
        </a>
        @auth
            <div id="sidebarToggleTop" class="d-sm-none input-group mr-3">
                <li class="nav-link"><a class="text-decoration-none" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            </div>
            <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                <div class="input-group">
                    <li class="nav-link"><a class="text-decoration-none" href="{{ route('dashboard') }}"><i
                                class="fas fa-home"></i> <span class="mx-auto">Dashboard</span></a>
                    </li>
                </div>
            </div>
        @endauth

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="{{ route('search') }}">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" name="search" placeholder="Søg"
                    aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form>
    @else
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
    @endif


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        @if (Route::is('front') || Route::is('search'))
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search" method="get" action="{{ route('search') }}">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" name="search" placeholder="Søg"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
        @endif

        <div class="topbar-divider d-none d-sm-block"></div>

        @auth
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                    <img class="img-profile rounded-circle" src="{{ asset('images/undraw_profile.svg') }}">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Log ud
                    </a>
                </div>
            </li>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Klar til at logge ud?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Er du klar til at logge ud? Klik "Log ud" neden for hvis du er er
                            klar til at logge ud.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Anunller</button>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn btn-primary" type="submit">Log ud</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold text-primary"
                    href="{{ route('register') }}">{{ __('Registrer') }}</a>
            </li>
        @endauth

    </ul>

</nav>
<!-- End of Topbar -->
