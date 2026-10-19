@extends('layouts.public')
@section('body-class', 'layanan-page')
@section('header-class', 'sticky-top')
@section('content-header')

<div class="page-title" data-aos="fade">
  <div class="container">
    <nav class="breadcrumbs">
      <ol>
        <li><a href="{{ url('/') }}">Beranda</a></li>
        <li class="current">Layanan</li>
      </ol>
    </nav>
    <h1>Layanan</h1>
  </div>
</div>

<section id="work-process" class="work-process section">

  <div class="container section-title" data-aos="fade-up">
    <h2>LAYANAN</h2>
    <p>Kami menghadirkan solusi melalui tahapan yang terstruktur dan terukur untuk hasil yang maksimal.</p>
  </div>

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-5">

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
        <div class="steps-item">
          <div class="steps-image">
            <img src="{{ url('backend/assets/img/steps/steps-1.webp') }}" alt="Langkah 1" class="img-fluid" loading="lazy">
          </div>
          <div class="steps-content">
            <div class="steps-number">01</div>
            <h3>Riset &amp; Analisis</h3>
            <p>Kami memulai dengan memahami kebutuhan Anda melalui riset mendalam dan analisis data yang akurat untuk menghasilkan landasan yang kuat.</p>
            <div class="steps-features">
              <div class="feature-item">
                <i class="bi bi-check-circle"></i>
                <span>Riset Pasar</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle"></i>
                <span>Analisis Data</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle"></i>
                <span>Umpan Balik Pengguna</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
        <div class="steps-item">
          <div class="steps-image">
            <img src="{{ url('backend/assets/img/steps/steps-2.webp') }}" alt="Langkah 2" class="img-fluid" loading="lazy">
          </div>
          <div class="steps-content">
            <div class="steps-number">02</div>
            <h3>Desain &amp; Perencanaan</h3>
            <p>Kami merancang solusi yang tepat sasaran dengan pendekatan kreatif dan perencanaan yang matang sesuai kebutuhan Anda.</p>
            <div class="steps-features">
              <div class="feature-item">
                <i class="bi bi-check-circle"></i>
                <span>Pembuatan Wireframe</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle"></i>
                <span>Desain UI/UX</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle"></i>
                <span>Prototipe</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="400">
        <div class="steps-item">
          <div class="steps-image">
            <img src="{{ url('backend/assets/img/steps/steps-3.webp') }}" alt="Langkah 3" class="img-fluid" loading="lazy">
          </div>
          <div class="steps-content">
            <div class="steps-number">03</div>
            <h3>Pengembangan &amp; Peluncuran</h3>
            <p>Kami mengembangkan solusi secara menyeluruh, melakukan pengujian ketat, dan meluncurkannya dengan standar kualitas terbaik.</p>
            <div class="steps-features">
              <div class="feature-item">
                <i class="bi bi-check-circle"></i>
                <span>Pengembangan</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle"></i>
                <span>Pengujian</span>
              </div>
              <div class="feature-item">
                <i class="bi bi-check-circle"></i>
                <span>Peluncuran</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</section>

@endsection