<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


{{-- include the header that has css and title --}}
@include('client.partials.header')

<body class="layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('client.partials.nav')
        <!-- /.navbar -->



        <!-- Content Wrapper. Contains page content -->
        

            <div class="container">
                @yield('content')
            </div>
    
        <!-- /.content-wrapper -->

     

        <!-- Main Footer -->
        @include('client.partials.footer')
