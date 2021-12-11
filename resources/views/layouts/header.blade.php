<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@if (Route::is('front')){{ config('app.name') }}@else @yield('title', 'Home') | {{ config('app.name') }} @endif</title>
<!-- Logo -->
<link rel="icon" href="{{ asset('fav.ico') }}" type="image/png" sizes="16x16">

<!-- Fonts -->
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Styles -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">

@yield('css')
