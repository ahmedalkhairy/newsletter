<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


{{-- include the header that has css and title --}}
@include('dashboard.partials.header')

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('dashboard.partials.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('dashboard.partials.sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <div class="container" >
                @yield('content')
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('dashboard.partials.footer')


