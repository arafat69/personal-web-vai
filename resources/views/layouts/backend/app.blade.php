<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/rejaul.jpeg') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/simplebar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrapStyle.min.css') }}" />
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
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="https://cdn.tiny.cloud/1/wexlxliqhmjrp5yn377151vsul83009dmhjh86spkreq9q27/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
      </script>
    @stack('script')
</body>

</html>
