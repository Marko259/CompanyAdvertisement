<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $advertisement->title }} | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
</head>

<body class="header">
    <div class="container-fluid">
        <h1 class="text-capitalize">Hyr {{ $advertisement->title }} nu!</h1>
        <div class="mt-2"></div>
        <p>@markdown($advertisement->description)</p>
        <div class="mt-3"></div>
        <p>{{ $advertisement->title }} tager kun <strong>{{ $advertisement->price }} DKK</strong> i timen for deres arbejde.</p>
        <a class="btn-bgstroke text-decoration-none text-white" @if (str_contains($advertisement->contact_info, '@')) href="mailto:{{ $advertisement->contact_info }}" @elseif(is_numeric($advertisement->contact_info)) href="tel:{{ $advertisement->contact_info }}" @endif>Hyr {{ $advertisement->title }} via følgende - {{ $advertisement->contact_info }}</a>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
