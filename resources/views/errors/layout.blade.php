<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
    <link href="{{ url('gambar/logo/favicon.png') }}" rel="icon">
    <link href="{{ url('gambar/logo/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="{{ url('publik/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('publik/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('publik/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('publik/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ url('publik/css/main.css') }}" rel="stylesheet">
</head>

<body class="page-404">
  <main class="main">
    <section id="error-404" class="error-404 section">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center">
          <div class="error-icon mb-4" data-aos="zoom-in" data-aos-delay="200">
            <i class="bi @yield('icon', 'bi-exclamation-circle')"></i>
          </div>
          <h1 class="error-code mb-4" data-aos="fade-up" data-aos-delay="300">@yield('code')</h1>
          <h2 class="error-title mb-3" data-aos="fade-up" data-aos-delay="400">@yield('title')</h2>
          <p class="error-text mb-4" data-aos="fade-up" data-aos-delay="500">
            Halaman yang Anda cari mungkin telah dihapus, namanya telah diubah, atau untuk sementara tidak tersedia.
          </p>
          <div class="search-box mb-4" data-aos="fade-up" data-aos-delay="600">
            <form action="#" class="search-form">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for pages..." aria-label="Search">
                <button class="btn search-btn" type="submit">
                  <i class="bi bi-search"></i>
                </button>
              </div>
            </form>
          </div>
          <div class="error-action" data-aos="fade-up" data-aos-delay="700">
            <a href="/" class="btn btn-primary">Back to Home</a>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>