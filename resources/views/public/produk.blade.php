@extends('layouts.public')
@section('body-class', 'blog-page')
@section('content-header')
@section('header-class', 'sticky-top')


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
  </div>
  <section id="recent-blog-postst" class="recent-blog-postst section">
        <div class="container section-title" data-aos="fade-up">
            <h2>SOURCE CODE.</h2>
        </div>
        
        <div class="container">
            <div class="row gy-5">
                @forelse($produks as $produk)
                    <div class="col-xl-4 col-md-6" data-aos="fade-up">
                        <div class="post-item position-relative h-100">
                            <div class="post-img position-relative overflow-hidden">
                                <img src="{{ $produk->thumbnail ? url('uploads/produk/thumbnail/'.$produk->thumbnail) : url('backend/assets/img/blog/blog-post-1.webp') }}" class="img-fluid" alt="">
                                <span class="post-date">{{ $produk->tipe == 'gratis' ? 'GRATIS' : 'PREMIUM' }}</span>
                            </div>
                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title">{{ $produk->judul }}</h3>
                                <div class="meta d-flex align-items-center">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person"></i> <span class="ps-2">{{ $produk->developer_name ?? 'Admin' }}</span>
                                    </div>
                                    <span class="px-3 text-black-50">/</span>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-folder2"></i> <span class="ps-2">{{ $produk->kategori_name }}</span>
                                    </div>
                                </div>
                                <hr>
                                <a href="{{ url('source-code/'.$produk->slug) }}" class="readmore stretched-link">
                                    <span>
                                        @if($produk->tipe == 'gratis')
                                            Download Gratis
                                        @else
                                            Harga: Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                        @endif
                                    </span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada produk source code yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
