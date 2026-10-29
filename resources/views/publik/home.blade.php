@extends('layouts.publik')
@section('title', 'Blog')
@section('content-header')

<section class="hero section dark-background">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
        <h1>Source Code untuk Belajar & Produksi</h1>
        <p>Download, baca, modifikasi. Versi dasar terbuka, versi lengkap untuk produksi.</p>
        <div class="d-flex">
          <a href="{{ url('produk') }}" class="btn-get-started">Lihat Source Code</a>
          <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
        </div>
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
        <img src="{{ url('backend/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>
</section>
<!-- /End Hero -->

<!-- Clients -->
<section id="clients" class="clients section light-background">
  <div class="container" data-aos="zoom-in">
    <div class="swiper init-swiper">
      <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
      <div class="swiper-wrapper align-items-center">
        <div class="swiper-slide"><img src="{{ url('backend/assets/img/clients/clients-1.webp') }}" class="img-fluid"
            alt=""></div>
        <div class="swiper-slide"><img src="{{ url('backend/assets/img/clients/clients-2.webp') }}" class="img-fluid"
            alt=""></div>
        <div class="swiper-slide"><img src="{{ url('backend/assets/img/clients/clients-3.webp') }}" class="img-fluid"
            alt=""></div>
        <div class="swiper-slide"><img src="{{ url('backend/assets/img/clients/clients-4.webp') }}" class="img-fluid"
            alt=""></div>
        <div class="swiper-slide"><img src="{{ url('backend/assets/img/clients/clients-5.webp') }}" class="img-fluid"
            alt=""></div>
        <div class="swiper-slide"><img src="{{ url('backend/assets/img/clients/clients-6.webp') }}" class="img-fluid"
            alt=""></div>
        <div class="swiper-slide"><img src="{{ url('backend/assets/img/clients/clients-7.webp') }}" class="img-fluid"
            alt=""></div>
        <div class="swiper-slide"><img src="{{ url('backend/assets/img/clients/clients-8.webp') }}" class="img-fluid"
            alt=""></div>
      </div>
    </div>
  </div>
</section>
<!-- /End Clients -->


<!-- Layanan -->
<section id="layanan" class="section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Layanan</h2>
    <p>Proses kerja yang jelas, dari konsultasi sampai selesai.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4">

      @foreach ($layanan as $data)
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="card h-100 border-0 shadow-sm">
          <img src="{{ url('gambar/layanan.png') }}" class="card-img-top" alt="Konsultasi"
            loading="lazy">
          <div class="card-body">
            <h3 class="card-title h5">01. Konsultasi</h3>
            <p class="card-text">Ceritakan kebutuhanmu. Saya bantu tentukan solusi yang paling pas.</p>
            <ul class="list-unstyled mb-0">
              <li><i class="bi bi-check-circle text-primary me-2"></i>Diskusi Kebutuhan</li>
              <li><i class="bi bi-check-circle text-primary me-2"></i>Analisis Solusi</li>
              <li><i class="bi bi-check-circle text-primary me-2"></i>Estimasi Waktu</li>
            </ul>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>
<!-- /End Layanan -->


<section id="recent-blog-postst" class="recent-blog-postst section light-background">
  <div class="container section-title" data-aos="fade-up">
    <h2>Blog Terbaru</h2>
    <p>Artikel dan tutorial seputar coding dan source code.</p>
  </div>

  <div class="container">
    <div class="row gy-5">
      <div class="col-xl-4 col-md-6">
        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
          <div class="post-img position-relative overflow-hidden">
            <img src="{{ url('backend/assets/img/blog/blog-post-1.webp') }}" class="img-fluid" alt="">
            <span class="post-date">12 Desember</span>
          </div>
          <div class="post-content d-flex flex-column">
            <h3 class="post-title">Cara Bikin CRUD Laravel untuk Pemula</h3>
            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Admin</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">Laravel</span>
              </div>
            </div>
            <hr>
            <a href="blog-details.html" class="readmore stretched-link"><span>Baca Selengkapnya</span><i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6">
        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">
          <div class="post-img position-relative overflow-hidden">
            <img src="{{ url('backend/assets/img/blog/blog-post-2.webp') }}" class="img-fluid" alt="">
            <span class="post-date">17 Juli</span>
          </div>
          <div class="post-content d-flex flex-column">
            <h3 class="post-title">Tips Bootstrap 5 Biar Website Responsive</h3>
            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Admin</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">Bootstrap</span>
              </div>
            </div>
            <hr>
            <a href="blog-details.html" class="readmore stretched-link"><span>Baca Selengkapnya</span><i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="post-item position-relative h-100">
          <div class="post-img position-relative overflow-hidden">
            <img src="{{ url('backend/assets/img/blog/blog-post-3.webp') }}" class="img-fluid" alt="">
            <span class="post-date">05 September</span>
          </div>
          <div class="post-content d-flex flex-column">
            <h3 class="post-title">Cara Upload File di Laravel</h3>
            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Admin</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">Laravel</span>
              </div>
            </div>
            <hr>
            <a href="blog-details.html" class="readmore stretched-link"><span>Baca Selengkapnya</span><i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="portfolio" class="recent-blog-postst section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Source Code Terbaru</h2>
    <p>Pilih source code yang kamu butuhkan.</p>
  </div>
  <div class="container">
    <div class="row gy-5">
      <div class="col-xl-4 col-md-6">
        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="100">
          <div class="post-img position-relative overflow-hidden">
            <img src="{{ url('backend/assets/img/blog/blog-post-1.webp') }}" class="img-fluid" alt="">
            <span class="post-date">12 Desember</span>
          </div>
          <div class="post-content d-flex flex-column">
            <h3 class="post-title">Cara Bikin CRUD Laravel untuk Pemula</h3>
            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Admin</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">Laravel</span>
              </div>
            </div>
            <hr>
            <a href="blog-details.html" class="readmore stretched-link"><span>Baca Selengkapnya</span><i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div>
      </div>

      <div class="col-xl-4 col-md-6">
        <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="200">

          <div class="post-img position-relative overflow-hidden">
            <img src="{{ url('backend/assets/img/blog/blog-post-2.webp') }}" class="img-fluid" alt="">
            <span class="post-date">17 Juli</span>
          </div>

          <div class="post-content d-flex flex-column">

            <h3 class="post-title">Tips Bootstrap 5 Biar Website Responsive</h3>
            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Admin</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">Bootstrap</span>
              </div>
            </div>

            <hr>

            <a href="blog-details.html" class="readmore stretched-link"><span>Baca Selengkapnya</span><i
                class="bi bi-arrow-right"></i></a>

          </div>

        </div>
      </div>

      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="post-item position-relative h-100">

          <div class="post-img position-relative overflow-hidden">
            <img src="{{ url('backend/assets/img/blog/blog-post-3.webp') }}" class="img-fluid" alt="">
            <span class="post-date">05 September</span>
          </div>

          <div class="post-content d-flex flex-column">

            <h3 class="post-title">Cara Upload File di Laravel</h3>

            <div class="meta d-flex align-items-center">
              <div class="d-flex align-items-center">
                <i class="bi bi-person"></i> <span class="ps-2">Admin</span>
              </div>
              <span class="px-3 text-black-50">/</span>
              <div class="d-flex align-items-center">
                <i class="bi bi-folder2"></i> <span class="ps-2">Laravel</span>
              </div>
            </div>

            <hr>

            <a href="blog-details.html" class="readmore stretched-link"><span>Baca Selengkapnya</span><i
                class="bi bi-arrow-right"></i></a>

          </div>

        </div>
      </div>

    </div>

  </div>

</section>


<!-- FAQ -->
<section id="faq" class="section">
  <div class="container section-title" data-aos="fade-up">
    <h2>Pertanyaan Umum</h2>
    <p>Beberapa pertanyaan yang sering ditanyakan.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="accordion" id="faqAccordion">

          <div class="accordion-item border-0 shadow-sm mb-3">
            <h3 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1"
                aria-expanded="true" aria-controls="faq1">
                Apa bedanya versi Terbuka dan Lengkap?
              </button>
            </h3>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Versi Terbuka bisa langsung download dan dipakai untuk belajar. Versi Lengkap
                ada fitur tambahan dan lisensi komersial.</div>
            </div>
          </div>

          <div class="accordion-item border-0 shadow-sm mb-3">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2"
                aria-expanded="false" aria-controls="faq2">
                Apakah source code boleh dipakai komersial?
              </button>
            </h3>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Versi Terbuka untuk belajar. Versi Lengkap boleh dipakai untuk proyek
                komersial.</div>
            </div>
          </div>

          <div class="accordion-item border-0 shadow-sm mb-3">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3"
                aria-expanded="false" aria-controls="faq3">
                Bagaimana cara download?
              </button>
            </h3>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Klik tombol Download. Kalau belum punya akun, daftar dulu.</div>
            </div>
          </div>

          <div class="accordion-item border-0 shadow-sm mb-3">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4"
                aria-expanded="false" aria-controls="faq4">
                Bagaimana cara bayar versi Lengkap?
              </button>
            </h3>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Transfer bank atau QRIS. Setelah bayar, akses langsung terbuka.</div>
            </div>
          </div>

          <div class="accordion-item border-0 shadow-sm">
            <h3 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5"
                aria-expanded="false" aria-controls="faq5">
                Apakah ada support?
              </button>
            </h3>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">Ada. Bisa hubungi lewat WhatsApp atau email.</div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
@endsection