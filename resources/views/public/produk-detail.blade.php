@extends('layouts.public')
@section('body-class', 'blog-page')
@section('content-header')
@section('header-class', 'sticky-top')

    <!-- Judul Halaman -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Beranda</a></li>
            <li class="current">Detail Blog</li>
          </ol>
        </nav>
        <h1>Detail Blog</h1>
      </div>
    </div><!-- Akhir Judul Halaman -->

    <div class="container">
      <div class="row">

        <div class="col-lg-8">

          <!-- Bagian Detail Blog -->
          <section id="blog-details" class="blog-details section">
            <div class="container" data-aos="fade-up">

              <article class="article">

                <div class="hero-img" data-aos="zoom-in">
                  <img src="assets/img/blog/blog-post-3.webp" alt="Gambar blog unggulan" class="img-fluid" loading="lazy">
                  <div class="meta-overlay">
                    <div class="meta-categories">
                      <a href="#" class="category">Pengembangan Web</a>
                      <span class="divider">•</span>
                      <span class="reading-time"><i class="bi bi-clock"></i> 6 menit baca</span>
                    </div>
                  </div>
                </div>

                <div class="article-content" data-aos="fade-up" data-aos-delay="100">
                  <div class="content-header">
                    <h1 class="title">Pengembangan Web Modern: Praktik Terbaik dan Tren Masa Depan untuk 2025</h1>

                    <div class="author-info">
                      <div class="author-details">
                        <img src="assets/img/person/person-f-8.webp" alt="Penulis" class="author-img">
                        <div class="info">
                          <h4>Michael Chen</h4>
                          <span class="role">Pengembang Web Senior</span>
                        </div>
                      </div>
                      <div class="post-meta">
                        <span class="date"><i class="bi bi-calendar3"></i> 15 Mar 2025</span>
                        <span class="divider">•</span>
                        <span class="comments"><i class="bi bi-chat-text"></i> 18 Komentar</span>
                      </div>
                    </div>
                  </div>

                  <div class="content">
                    <p class="lead">
                      Lanskap pengembangan web terus berkembang dengan kecepatan yang belum pernah terjadi sebelumnya, menghadirkan teknologi, kerangka kerja, dan metodologi baru yang membentuk ulang cara kita membangun aplikasi web modern.
                    </p>

                    <p>
                      Saat kita memasuki tahun 2025, ekosistem pengembangan web telah bertransformasi secara dramatis, memperkenalkan pendekatan inovatif untuk membangun pengalaman web yang lebih cepat, lebih aman, dan sangat menarik. Panduan komprehensif ini mengeksplorasi tren dan praktik terbaik terbaru yang mendefinisikan masa depan pengembangan web.
                    </p>

                    <h2>Kebangkitan Komponen Web</h2>
                    <p>
                      Komponen Web menjadi semakin penting dalam pengembangan web modern, menawarkan cara standar untuk membuat elemen kustom yang dapat digunakan kembali. Keuntungan utama meliputi:
                    </p>
                    <ul>
                      <li>Peningkatan penggunaan ulang kode di berbagai kerangka kerja</li>
                      <li>Enkapsulasi fungsionalitas yang lebih baik</li>
                      <li>Pemeliharaan dan skalabilitas yang lebih baik</li>
                      <li>Pengembangan komponen yang tidak bergantung pada kerangka kerja</li>
                    </ul>

                    <div class="highlight-box">
                      <h3>Tren Utama di 2025</h3>
                      <ul class="trend-list">
                        <li>
                          <i class="bi bi-lightning-charge"></i>
                          <span>Komputasi Edge dan Arsitektur Serverless</span>
                        </li>
                        <li>
                          <i class="bi bi-shield-check"></i>
                          <span>Langkah Keamanan yang Ditingkatkan</span>
                        </li>
                        <li>
                          <i class="bi bi-phone"></i>
                          <span>Progressive Web Apps (PWA)</span>
                        </li>
                      </ul>
                    </div>

                    <h2>Optimasi Performa</h2>
                    <p>
                      Performa tetap menjadi faktor kritis dalam pengembangan web, dengan fokus yang meningkat pada Core Web Vitals dan metrik pengalaman pengguna. Aplikasi modern harus dioptimalkan untuk kecepatan dan efisiensi.
                    </p>

                    <blockquote>
                      <p>
                        "Masa depan pengembangan web tidak hanya terletak pada menulis kode, tetapi dalam menciptakan pengalaman yang mulus, dapat diakses, dan berkinerja tinggi yang bekerja untuk semua orang, di mana pun."
                      </p>
                      <cite>Emily Thompson, Arsitek Performa Web</cite>
                    </blockquote>

                    <div class="content-grid">
                      <div class="row g-4">
                        <div class="col-md-6">
                          <div class="info-card">
                            <i class="bi bi-speedometer2"></i>
                            <h4>Metrik Performa</h4>
                            <p>Fokus pada Core Web Vitals dan metrik performa yang berpusat pada pengguna untuk peringkat pencarian dan pengalaman pengguna yang lebih baik.</p>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="info-card">
                            <i class="bi bi-universal-access"></i>
                            <h4>Aksesibilitas</h4>
                            <p>Menerapkan pedoman WCAG dan memastikan aplikasi web dapat diakses oleh semua pengguna di berbagai perangkat.</p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <h2>Melihat ke Depan</h2>
                    <p>
                      Saat kita melanjutkan melalui tahun 2025, praktik pengembangan web akan terus berkembang, merangkul teknologi baru sambil mempertahankan fondasi yang kuat dalam performa, aksesibilitas, dan pengalaman pengguna. Tetap mengikuti tren dan praktik terbaik ini sangat penting bagi pengembang yang ingin membangun aplikasi web modern yang skalabel.
                    </p>
                  </div>

                  <div class="meta-bottom">
                    <div class="tags-section">
                      <h4>Topik Terkait</h4>
                      <div class="tags">
                        <a href="#" class="tag">Pengembangan Web</a>
                        <a href="#" class="tag">Performa</a>
                        <a href="#" class="tag">Praktik Terbaik</a>
                        <a href="#" class="tag">Tren</a>
                        <a href="#" class="tag">2025</a>
                      </div>
                    </div>

                    <div class="share-section">
                      <h4>Bagikan Artikel</h4>
                      <div class="social-links">
                        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="copy-link" title="Salin Tautan"><i class="bi bi-link-45deg"></i></a>
                      </div>
                    </div>
                  </div>
                </div>

              </article>

            </div>
          </section><!-- /Bagian Detail Blog -->

          <!-- Bagian Komentar Blog -->
          <section id="blog-comments" class="blog-comments section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <div class="blog-comments-4">
                <div class="comments-header">
                  <h3 class="title">Umpan Balik Komunitas</h3>
                  <div class="comments-stats">
                    <span class="count">12</span>
                    <span class="label">Komentar</span>
                  </div>
                </div>

                <div class="comments-container">
                  <!-- Komentar #1 -->
                  <div class="comment-thread">
                    <div class="comment-box">
                      <div class="comment-wrapper">
                        <div class="avatar-wrapper">
                          <img src="assets/img/person/person-f-9.webp" alt="Avatar" loading="lazy">
                          <span class="status-indicator"></span>
                        </div>

                        <div class="comment-content">
                          <div class="comment-header">
                            <div class="user-info">
                              <h4>Thomas Anderson</h4>
                              <span class="time-badge">
                                <i class="bi bi-clock"></i>
                                2 jam yang lalu
                              </span>
                            </div>
                            <div class="engagement">
                              <span class="likes">
                                <i class="bi bi-heart"></i>
                                24
                              </span>
                            </div>
                          </div>

                          <div class="comment-body">
                            <p>Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc.</p>
                          </div>

                          <div class="comment-actions">
                            <button class="action-btn like-btn" aria-label="Sukai komentar">
                              <i class="bi bi-heart"></i>
                              <span>Suka</span>
                            </button>
                            <button class="action-btn reply-btn" aria-label="Balas komentar">
                              <i class="bi bi-chat"></i>
                              <span>Balas</span>
                            </button>
                            <button class="action-btn share-btn" aria-label="Bagikan komentar">
                              <i class="bi bi-share"></i>
                              <span>Bagikan</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Kontainer Balasan -->
                    <div class="replies-container">
                      <!-- Balasan #1 -->
                      <div class="comment-box reply">
                        <div class="comment-wrapper">
                          <div class="avatar-wrapper">
                            <img src="assets/img/person/person-m-9.webp" alt="Avatar" loading="lazy">
                            <span class="status-indicator"></span>
                          </div>

                          <div class="comment-content">
                            <div class="comment-header">
                              <div class="user-info">
                                <h4>Maria Rodriguez</h4>
                                <span class="time-badge">
                                  <i class="bi bi-clock"></i>
                                  1 jam yang lalu
                                </span>
                              </div>
                              <div class="engagement">
                                <span class="likes">
                                  <i class="bi bi-heart"></i>
                                  8
                                </span>
                              </div>
                            </div>

                            <div class="comment-body">
                              <p>Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae.</p>
                            </div>

                            <div class="comment-actions">
                              <button class="action-btn like-btn" aria-label="Sukai komentar">
                                <i class="bi bi-heart"></i>
                                <span>Suka</span>
                              </button>
                              <button class="action-btn reply-btn" aria-label="Balas komentar">
                                <i class="bi bi-chat"></i>
                                <span>Balas</span>
                              </button>
                              <button class="action-btn share-btn" aria-label="Bagikan komentar">
                                <i class="bi bi-share"></i>
                                <span>Bagikan</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Balasan #2 -->
                      <div class="comment-box reply">
                        <div class="comment-wrapper">
                          <div class="avatar-wrapper">
                            <img src="assets/img/person/person-f-9.webp" alt="Avatar" loading="lazy">
                            <span class="status-indicator"></span>
                          </div>

                          <div class="comment-content">
                            <div class="comment-header">
                              <div class="user-info">
                                <h4>Alex Chen</h4>
                                <span class="time-badge">
                                  <i class="bi bi-clock"></i>
                                  30 menit yang lalu
                                </span>
                              </div>
                              <div class="engagement">
                                <span class="likes">
                                  <i class="bi bi-heart"></i>
                                  5
                                </span>
                              </div>
                            </div>

                            <div class="comment-body">
                              <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>
                            </div>

                            <div class="comment-actions">
                              <button class="action-btn like-btn" aria-label="Sukai komentar">
                                <i class="bi bi-heart"></i>
                                <span>Suka</span>
                              </button>
                              <button class="action-btn reply-btn" aria-label="Balas komentar">
                                <i class="bi bi-chat"></i>
                                <span>Balas</span>
                              </button>
                              <button class="action-btn share-btn" aria-label="Bagikan komentar">
                                <i class="bi bi-share"></i>
                                <span>Bagikan</span>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Komentar #2 -->
                  <div class="comment-thread">
                    <div class="comment-box">
                      <div class="comment-wrapper">
                        <div class="avatar-wrapper">
                          <img src="assets/img/person/person-f-7.webp" alt="Avatar" loading="lazy">
                          <span class="status-indicator"></span>
                        </div>

                        <div class="comment-content">
                          <div class="comment-header">
                            <div class="user-info">
                              <h4>Emily Watson</h4>
                              <span class="time-badge">
                                <i class="bi bi-clock"></i>
                                3 jam yang lalu
                              </span>
                            </div>
                            <div class="engagement">
                              <span class="likes">
                                <i class="bi bi-heart"></i>
                                15
                              </span>
                            </div>
                          </div>

                          <div class="comment-body">
                            <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                          </div>

                          <div class="comment-actions">
                            <button class="action-btn like-btn" aria-label="Sukai komentar">
                              <i class="bi bi-heart"></i>
                              <span>Suka</span>
                            </button>
                            <button class="action-btn reply-btn" aria-label="Balas komentar">
                              <i class="bi bi-chat"></i>
                              <span>Balas</span>
                            </button>
                            <button class="action-btn share-btn" aria-label="Bagikan komentar">
                              <i class="bi bi-share"></i>
                              <span>Bagikan</span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>

          </section><!-- /Bagian Komentar Blog -->

          <!-- Bagian Formulir Komentar Blog -->
          <section id="blog-comment-form" class="blog-comment-form section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

              <form method="post" role="form">

                <div class="form-header">
                  <h3>Tinggalkan Komentar</h3>
                  <p>Alamat email Anda tidak akan dipublikasikan. Kolom yang wajib diisi ditandai dengan *</p>
                </div>

                <div class="row gy-3">
                  <div class="col-md-6">
                    <div class="input-group">
                      <label for="name">Nama Lengkap *</label>
                      <input type="text" name="name" id="name" placeholder="Masukkan nama lengkap Anda" required="">
                      <span class="error-text">Silakan masukkan nama Anda</span>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="input-group">
                      <label for="email">Alamat Email *</label>
                      <input type="email" name="email" id="email" placeholder="Masukkan alamat email Anda" required="">
                      <span class="error-text">Silakan masukkan alamat email yang valid</span>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group">
                      <label for="website">Situs Web</label>
                      <input type="url" name="website" id="website" placeholder="Situs web Anda (opsional)">
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="input-group">
                      <label for="comment">Komentar Anda *</label>
                      <textarea name="comment" id="comment" rows="5" placeholder="Tulis pemikiran Anda di sini..." required=""></textarea>
                      <span class="error-text">Silakan masukkan komentar Anda</span>
                    </div>
                  </div>

                  <div class="col-12 text-center">
                    <button type="submit">Kirim Komentar</button>
                  </div>
                </div>

              </form>

            </div>

          </section><!-- /Bagian Formulir Komentar Blog -->

        </div>

        <div class="col-lg-4 sidebar">

          <div class="widgets-container" data-aos="fade-up" data-aos-delay="200">

            <!-- Widget Pencarian -->
            <div class="search-widget widget-item">

              <h3 class="widget-title">Pencarian</h3>
              <form action="">
                <input type="text">
                <button type="submit" title="Cari"><i class="bi bi-search"></i></button>
              </form>

            </div><!--/Widget Pencarian -->

            <!-- Widget Postingan Terbaru -->
            <div class="recent-posts-widget widget-item">

              <h3 class="widget-title">Postingan Terbaru</h3>

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-1.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Nihil blanditiis at in nihil autem</a></h4>
                  <time datetime="2020-01-01">1 Jan 2020</time>
                </div>
              </div><!-- Akhir item postingan terbaru-->

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-2.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Quidem autem et impedit</a></h4>
                  <time datetime="2020-01-01">1 Jan 2020</time>
                </div>
              </div><!-- Akhir item postingan terbaru-->

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-3.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Id quia et et ut maxime similique occaecati ut</a></h4>
                  <time datetime="2020-01-01">1 Jan 2020</time>
                </div>
              </div><!-- Akhir item postingan terbaru-->

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-4.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Laborum corporis quo dara net para</a></h4>
                  <time datetime="2020-01-01">1 Jan 2020</time>
                </div>
              </div><!-- Akhir item postingan terbaru-->

              <div class="post-item">
                <img src="assets/img/blog/blog-post-square-5.webp" alt="" class="flex-shrink-0">
                <div>
                  <h4><a href="blog-details.html">Et dolores corrupti quae illo quod dolor</a></h4>
                  <time datetime="2020-01-01">1 Jan 2020</time>
                </div>
              </div><!-- Akhir item postingan terbaru-->

            </div><!--/Widget Postingan Terbaru -->

            <!-- Widget Kategori -->
            <div class="categories-widget widget-item">

              <h3 class="widget-title">Kategori</h3>
              <ul class="mt-3">
                <li><a href="#">Umum <span>(25)</span></a></li>
                <li><a href="#">Gaya Hidup <span>(12)</span></a></li>
                <li><a href="#">Perjalanan <span>(5)</span></a></li>
                <li><a href="#">Desain <span>(22)</span></a></li>
                <li><a href="#">Kreatif <span>(8)</span></a></li>
                <li><a href="#">Pendidikan <span>(14)</span></a></li>
              </ul>

            </div><!--/Widget Kategori -->

            <!-- Widget Tag -->
            <div class="tags-widget widget-item">

              <h3 class="widget-title">Tag</h3>
              <ul>
                <li><a href="#">Aplikasi</a></li>
                <li><a href="#">TI</a></li>
                <li><a href="#">Bisnis</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Desain</a></li>
                <li><a href="#">Kantor</a></li>
                <li><a href="#">Kreatif</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Pintar</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Pemasaran</a></li>
              </ul>

            </div><!--/Widget Tag -->

          </div>

        </div>

      </div>
    </div>

@endsection