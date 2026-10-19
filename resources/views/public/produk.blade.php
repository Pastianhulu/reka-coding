@extends('layouts.public')
@section('body-class', 'blog-page')
@section('content-header')
@section('header-class', 'sticky-top')


  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="container">
      <nav class="breadcrumbs">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="current">Source Code</li>
        </ol>
      </nav>
      <h1>SOURCE CODE</h1>
    </div>
  </div><!-- End Page Title -->

  <section id="recent-blog-postst" class="recent-blog-postst section">
        <div class="container section-title" data-aos="fade-up">
            <h2>SOURCE CODE.</h2>
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
                            <a href="blog-details.html" class="readmore stretched-link"><span>Baca Selengkapnya</span><i class="bi bi-arrow-right"></i></a>
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
                            <a href="{{ url('produk-detail') }}" class="readmore stretched-link"><span>Harga: Rp 150.000</span><i class="bi bi-arrow-right"></i></a>
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
                            <a href="{{ url('produk-detail') }}" class="readmore stretched-link"><span>Harga: Rp 150.000</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
