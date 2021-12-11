<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.header')
</head>

<body id="page-top" @if (Route::is('login') || Route::is('register')) class="bg-gradient-primary" @endif>
    @if (Route::is('login') || Route::is('register'))
        <div class="container">
            @yield('content')
        </div>
    @else
        <div id="wrapper">
            @if (!Route::is('front') && !Route::is('search'))
                @include('layouts.sidebar')
            @endif
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('layouts.topbar')
                    @yield('content')
                </div>
                <!-- Footer -->
                <footer class="@if(Route::is('search')) footer @endif sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; {{ config('app.name') }}</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
        </div>
    @endif

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    @yield('js')
</body>

</html>
