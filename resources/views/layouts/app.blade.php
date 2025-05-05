<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Four Sides Group S.A. de C.V.">
    
    @include('partials.styles')
    @stack('styles')
    <title>@yield('title')</title>
</head>
<body class="bg-light">
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center">
        <div class="row justify-content-center w-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                @yield('content')
            </div>
        </div>
    </div>

    @include('partials.scripts')
    @stack('javascript')
</body>
</html>