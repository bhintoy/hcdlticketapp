<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HCDLPortal | Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
</head>

<body
    class="hold-transition sidebar-mini sidebar-collapse layout-navbar-fixed layout-fixed layout-footer-fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{ asset('images/logohcdl.png') }}" alt="AdminLTELogo" height="120"
                width="300">
        </div>
        <!-- Navbar -->
        @include('layouts.partials.header')
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.partials.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container-fluid">
                <section class="content">
                    <!-- Default box -->
                    @yield('content')
                </section>
            </div>
            <!-- /.content -->
        </div>
        @include('layouts.partials.footer')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')
</body>

</html>
