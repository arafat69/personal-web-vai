<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="container">
        @include('layouts.frontend.partials.header')
        @include('layouts.frontend.partials.navbar')

        <div class="layout row">
            <!-- left sidebar -->
            <div class="col-md-4 col-lg-3 mt-3">
                @include('layouts.frontend.partials.left-sidebar')
            </div>
            <!-- right sidebar -->
            <div class="col-md-8 col-lg-9 mt-3">
                @yield('content')
                @include('layouts.frontend.partials.right-sidebar')
            </div>
        </div>

        @include('layouts.frontend.partials.footer')
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
