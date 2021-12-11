<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Logo -->
    <link rel="icon" href="{{ asset('fav.ico') }}" type="image/png" sizes="16x16">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">
</head>

<body id="page-top">
    <div class="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar - Brand -->
                    <a class="d-flex align-items-center justify-content-center text-decoration-none"
                        href="{{ route('front') }}">
                        <div class="rotate-n-15">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <div class="d-sm-block d-none mx-3">{{ config('app.name') }}</div>
                    </a>
                    <div id="sidebarToggleTop" class="d-sm-none input-group mr-3">
                        <li class="nav-link"><a class="text-decoration-none"
                                href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    </div>

                    @auth
                        <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100">
                            <div class="input-group">
                                <li class="nav-link"><a class="text-decoration-none"
                                        href="{{ route('dashboard') }}"><i class="fas fa-home"></i> <span
                                            class="mx-auto">Dashboard</span></a>
                                </li>
                            </div>
                        </div>
                    @endauth

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        @auth
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span
                                        class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                                    <img class="img-profile rounded-circle"
                                        src="{{ asset('images/undraw_profile.svg') }}">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Log ud
                                    </a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold text-primary"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold text-primary"
                                    href="{{ route('register') }}">{{ __('Registrer') }}</a>
                            </li>
                        @endauth

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Klar til at logge ud?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Er du klar til at logge ud? Klik "Log ud" neden for hvis du er
                                er
                                klar til at logge ud.
                            </div>
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

                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h5 mb-0 text-gray-800">Velkommen til {{ config('app.name') }}</h1>
                    </div>
                    <h3 class="h6 mb-0 text-gray-800">Scroll for at se alle vores reklamer.</h3>

                    <div class="mb-5"></div>

                    @foreach ($advertisements as $advert)
                        <div class="row justify-content-center">
                            <!-- Area Chart -->
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Dropdown -->
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary"><a class="text-decoration-none"
                                                href="{{ route('advert.show', $advert->id) }}"
                                                target="_blank">{{ $advert->title }}</a></h6>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body">
                                        <div class="text-center">
                                            <img src="{{ asset('images/undraw_posting_photo.svg') }}" alt=""
                                                class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;">
                                        </div>
                                        <h6 class="m-0 font-weight-bold text-primary">
                                            <a href="{{ route('advert.show', $advert->id) }}"
                                                target="_blank">{{ $advert->title }}</a>
                                        </h6>
                                        <hr>
                                        <p>@markdown($advert->description)</p>
                                        <span>Filter:</span>
                                        <div class="mt-auto"></div>
                                        @foreach ($advert->filters()->get() as $filter)
                                            <p class="badge badge-info">{{ $filter->name }}</p>
                                        @endforeach
                                        <div class="mt-2"></div>
                                        <a href="{{ route('advert.show', $advert->id) }}"
                                            class="btn btn-primary btn-icon-split btn-sm" target="_blank"><span
                                                class="icon text-white-50"><i class="fas fa-eye"></i></span><span
                                                class="text">Se reklamen her</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4"></div>
                    @endforeach
                </div>
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; {{ config('app.name') }}</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
</body>

</html>
