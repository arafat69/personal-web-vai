@php
    use App\Models\Setting;
    $setting = Setting::first();
@endphp
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | {{ $setting?->title }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ $setting?->faviconPath ?? asset('assets/images/rejaul.jpeg') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/simplebar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrapStyle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-custom.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        @include('layouts.backend.partials.sidebar')
        <!--  Sidebar End -->

        <!--  Main wrapper -->
        <div class="body-wrapper">

            <!--  Header Start -->
            @include('layouts.backend.partials.header')
            <!--  Header End -->

            <div class="container-fluid">
                <!-- content -->
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/wexlxliqhmjrp5yn377151vsul83009dmhjh86spkreq9q27/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <script>
        $('.delete-confirm').on('click', function(e) {
            e.preventDefault();
            const url = $(this).attr('href');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#00B894',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            })
        });
    </script>

    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        </script>
    @endif
</body>

</html>
