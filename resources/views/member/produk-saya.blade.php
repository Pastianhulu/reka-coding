@extends('layouts.public')

@section('content-header')
<section class="section">
  <div class="container" data-aos="fade-up">
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('info'))
      <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    <div class="row gy-4">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <h3 class="mb-3">Pembelian Saya</h3>

            <div class="table-responsive">
              <table class="table align-middle">
                <thead>
                  <tr>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($pembelians as $pembelian)
                    <tr>
                      <td>{{ $pembelian->judul }}</td>
                      <td>Rp {{ number_format((int) $pembelian->harga, 0, ',', '.') }}</td>
                      <td>
                        @if ($pembelian->status === 'lunas')
                          <span class="badge text-bg-success">Lunas</span>
                        @else
                          <span class="badge text-bg-warning">Menunggu Verifikasi</span>
                        @endif
                      </td>
                      <td>
                        @if ($pembelian->status === 'lunas')
                          <a href="{{ route('member.produk.download', $pembelian->slug) }}" class="btn btn-sm btn-primary">Download</a>
                        @else
                          <span class="text-muted small">Transfer lalu konfirmasi ke admin.</span>
                        @endif
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="4" class="text-center text-muted">Belum ada pembelian.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

            @if ($pembelians->contains('status', 'pending') && $caraBayars->count())
              <hr>
              <h5>Rekening Pembayaran</h5>
              @foreach ($caraBayars as $caraBayar)
                <div class="border rounded p-2 mb-2 small">
                  <strong>{{ $caraBayar->name }}</strong> - {{ $caraBayar->nomor_rekening }} a.n. {{ $caraBayar->atas_nama }}
                </div>
              @endforeach
              <p class="text-muted small mb-0">
                Kirim bukti transfer ke admin
                @if ($profil && $profil->whatsapp)
                  (WhatsApp {{ $profil->whatsapp }})
                @endif
                agar pembelian diverifikasi.
              </p>
            @endif
          </div>
        </div>

        <div class="card border-0 shadow-sm mt-4">
          <div class="card-body p-4">
            <h3 class="mb-3">Produk Gratis</h3>
            <div class="row g-3">
              @forelse ($produkGratis as $produk)
                <div class="col-md-6">
                  <div class="border rounded p-3 h-100">
                    <h6 class="mb-1">{{ $produk->judul }}</h6>
                    <p class="text-muted small mb-2">Source code gratis.</p>
                    <a href="{{ route('member.produk.download', $produk->slug) }}" class="btn btn-sm btn-outline-primary">Download</a>
                  </div>
                </div>
              @empty
                <p class="text-muted mb-0">Belum ada produk gratis.</p>
              @endforelse
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <h5>Membership</h5>
            @if (auth()->user()->membership_until && auth()->user()->membership_until->gte(now()))
              <p class="text-success mb-2">Aktif sampai {{ auth()->user()->membership_until->format('d M Y') }}</p>
            @else
              <p class="text-muted mb-2">Belum aktif</p>
            @endif
            <a href="{{ route('member.upgrade') }}" class="btn btn-outline-primary w-100">Upgrade Membership</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
