<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="keywords" content="jasa web, aplikasi custom, laravel, web developer">
  <meta name="author" content="Pastian Hulu">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>WEB REKAC</title>
  <link href="{{ url('gambar/logo/favicon.png') }}" rel="icon">
  <link href="{{ url('gambar/logo/apple-touch-icon.png') }}" rel="apple-touch-icon">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ url('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ url('backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ url('backend/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ url('backend/plugins/toastr/toastr.min.css') }}">

  
</head>
<style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      font-weight: 500;
    }

    /* Custom Pace progress bar */
    .pace .pace-progress {
      height: 4px;
    }

    .pace .pace-progress-inner {
      box-shadow: none;
    }

    .pace .pace-activity {
      display: none;
    }

    .main-sidebar .nav-sidebar > .nav-item > .nav-link > .fas,
    .main-sidebar .nav-sidebar > .nav-item > .nav-link > .far,
    .main-sidebar .nav-sidebar > .nav-item > .nav-link > .fa {
      width: 1.0rem;
      text-align: center;
      margin-right: 0.1rem;
    }
 

  </style>

<body class="hold-transition sidebar-mini dark-mode layout-fixed text-sm layout-navbar-fixed layout-footer-fixed sidebar-collapse pace-dark">
<div class="wrapper">

  @include('layouts.navbar')
  @include('layouts.sidebar')

  <div class="content-wrapper">
    <div class="content-header">
      @yield('content-header')
    </div>
  </div>
  
  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('dashboard') }}">REKA CODING</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<script src="{{ url('backend/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url('backend/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('backend/plugins/moment/moment.min.js') }}"></script>
<script src="{{ url('backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ url('backend/sweetalert2.min.js') }}"></script> 
<script src="{{ url('backend/plugins/toastr.min.js') }}"></script> 
<script src="{{ url('backend/dist/js/adminlte.js') }}"></script>

@toastr_render
@toastr_js
@stack('scripts')


</body>
</html>
