<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>WEB REKAC</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="{{ url('gambar/logo/favicon.png') }}" rel="icon">
    <link href="{{ url('gambar/logo/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{ url('publik/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('publik/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('publik/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('publik/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('publik/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('backend/dist/css/adminlte.min.css') }}">
    <link href="{{ url('publik/css/main.css') }}" rel="stylesheet">
</head>

<body class="@yield('body-class', 'index-page')">

    <header id="header" class="header d-flex align-items-center @yield('header-class', 'fixed-top')">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
                <img src="{{ url('gambar/logo/logo.jpg') }}" alt="REKA CODING" style="height: 80px; width: auto;">
                <h3 class="sitename mb-0 ml-2">REKAC</h3>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                    <li><a href="{{ url('produk') }}" class="{{ request()->is('produk*') ? 'active' : '' }}">Source Code</a></li>
                    <li><a href="{{ url('blog') }}" class="{{ request()->is('blog*') ? 'active' : '' }}">Blog</a></li>
                    <li><a href="{{ url('layanan') }}" class="{{ request()->is('layanan*') ? 'active' : '' }}">Layanan</a></li>
                    <li><a href="{{ url('contact') }}" class="{{ request()->is('contact*') ? 'active' : '' }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
            <a class="btn-getstarted ms-1" href="{{ route('register') }}">Daftar</a>

        </div>
    </header>

    <main class="main">
        @yield('content-header')
    </main>

    @include('layouts.footer')

    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <div id="preloader"></div>

    <script src="{{ url('publik/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('publik/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ url('publik/vendor/aos/aos.js') }}"></script>
    <script src="{{ url('publik/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ url('publik/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ url('publik/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ url('publik/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ url('publik/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ url('publik/js/main.js') }}"></script>

</body>

</html>