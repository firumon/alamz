<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('meta-title','AL RAMZ')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed text-sm">
<div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <span class="float-right text-muted text-sm">Logout</span>
                </a>
            </li>
        </ul>
    </nav>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="{{ route('home') }}" class="brand-link">
            {{--            <img src="{{ asset('images/AlRamz-icon.png') }}" alt="AL RAMZ" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
            {{--            <img src="{{ asset('images/AlRamz-logo-sm.png') }}">--}}
            <span class="brand-text font-weight-light"><img src="{{ asset('images/alramz-logo-horizontal.png') }}"></span>
        </a>

        <div class="sidebar">

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                    @each('menu-item', $menus ?? [], 'item')
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"><h1 class="m-0 text-dark">@yield('title')</h1></div>
                    <div class="col-sm-6"><ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">@yield('button') @hasSection('back-button')<a class="btn-warning btn" href="{{ url()->previous() }}"><i class="fas fa fa-fw fa-angle-double-left"></i> Back</a> @endif</li></ol></div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-{{ date('Y')+1 }} <a href="http://alramz.ae">AL RAMZ</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block"><b>Version</b> 3.8.0</div>
    </footer>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('js/jquery.tablesorter.min.js') }}"></script>
<script src="{{ asset('js/adminlte.min.js') }}"></script>
@stack('js')
</body>
</html>
