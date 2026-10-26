@extends('layouts.public')

@section('content-header')
<section class="section">
  <div class="container" data-aos="fade-up">
    @if (session('info'))
      <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    <div class="row gy-4">
      <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <h3 class="mb-3">Upgrade Membership</h3>
            <p class="text-muted">Membership aktif membuka semua produk premium selama masa aktif.</p>

            @if (auth()->user()->membership_until && auth()->user()->membership_until->gte(now()))
              <div class="alert alert-success">
                Membership aktif sampai {{ auth()->user()->membership_until->format('d M Y H:i') }}.
              </div>
            @else
              <div class="alert alert-warning">
                Membership belum aktif.
              </div>
            @endif

            <h4 class="mt-4">Harga Membership</h4>
            <p class="fs-4 fw-bold mb-4">
              @if ($profil && $profil->harga_membership)
                Rp {{ number_format((int) $profil->harga_membership, 0, ',', '.') }}
              @else
                Hubungi admin untuk informasi harga.
              @endif
            </p>

            <h4>Rekening Pembayaran</h4>
            @forelse ($caraBayars as $caraBayar)
              <div class="border rounded p-3 mb-2">
                <strong>{{ $caraBayar->name }}</strong>
                <div>{{ $caraBayar->nomor_rekening }}</div>
                <div class="text-muted">a.n. {{ $caraBayar->atas_nama }}</div>
              </div>
            @empty
              <p class="text-muted">Belum ada metode pembayaran.</p>
            @endforelse

            <div class="alert alert-secondary mt-4 mb-0">
              Setelah transfer, kirim bukti pembayaran ke
              @if ($profil && $profil->whatsapp)
                WhatsApp {{ $profil->whatsapp }}
              @endif
              @if ($profil && $profil->email)
                atau email {{ $profil->email }}
              @endif
              . Admin akan mengaktifkan membership kamu.
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card border-0 shadow-sm">
          <div class="card-body p-4">
            <h5>Akun Saya</h5>
            <p class="mb-2">{{ auth()->user()->name }}</p>
            <p class="text-muted small mb-3">{{ auth()->user()->email }}</p>
            <a href="{{ route('member.produk-saya') }}" class="btn btn-outline-primary w-100">Produk Saya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
