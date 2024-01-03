<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/shared/iconly.css') }}">
    @stack('css')

</head>

<body>
    <div id="app">
        @include('layouts.navigation')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="page-heading">
                <h3>@yield('title')</h3>
            </div>
            @yield('content')

            @include('layouts.footer')

        </div>
    </div>
    <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/app.js') }}"></script> --}}

    @stack('js')

</body>

</html>
