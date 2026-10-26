@extends('layouts.backend')
@section('title', 'Dashboard')

@section('content-header')
<div class="content">
  <div class="container-fluid">

    {{-- Header --}}
    <div class="card bg-gradient-primary mb-4">
      <div class="card-body d-flex justify-content-between align-items-center py-3">
        <div>
          <small class="text-white-50">Selamat datang kembali</small>
          <h5 class="mb-0 font-weight-bold text-white">{{ auth()->user()->name }}</h5>
        </div>
        <div class="text-right">
          <small class="text-white-50">Hari ini</small>
          <div class="font-weight-bold text-white">{{ now()->format('l, d F Y') }}</div>
        </div>
      </div>
    </div>

    {{-- Kartu statistik --}}
    @php
      $stats = [
        ['label' => 'Total Produk',      'value' => 128, 'icon' => 'fa-box-open', 'bg' => 'bg-info'],
        ['label' => 'Produk Gratis',     'value' => 86,  'icon' => 'fa-gift',     'bg' => 'bg-success'],
        ['label' => 'Member Premium',    'value' => 42,  'icon' => 'fa-crown',    'bg' => 'bg-warning'],
        ['label' => 'Pembelian Pending', 'value' => 7,   'icon' => 'fa-clock',    'bg' => 'bg-danger'],
        ['label' => 'Dilihat Hari Ini',  'value' => 215, 'icon' => 'fa-eye',      'bg' => 'bg-purple'],
        ['label' => 'Developer Aktif',   'value' => 5,   'icon' => 'fa-user-cog', 'bg' => 'bg-orange'],
      ];
    @endphp

    <div class="row">
      @foreach ($stats as $s)
        <div class="col-xl-2 col-md-4 col-6">
          <div class="small-box {{ $s['bg'] }} shadow-sm">
            <div class="inner">
              <h3>{{ $s['value'] }}</h3>
              <p>{{ $s['label'] }}</p>
            </div>
            <div class="icon">
              <i class="fas {{ $s['icon'] }}"></i>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="row">

      {{-- Grafik --}}
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header border-0">
            <h3 class="card-title"><i class="fas fa-chart-line mr-2 text-info"></i>Produk Dilihat per Bulan</h3>
          </div>
          <div class="card-body pt-0">
            <canvas id="grafik-produk" style="height: 280px;"></canvas>
          </div>
        </div>
      </div>

      {{-- Komposisi --}}
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header border-0">
            <h3 class="card-title"><i class="fas fa-chart-pie mr-2 text-success"></i>Gratis vs Premium</h3>
          </div>
          <div class="card-body pt-0">
            <canvas id="grafik-tipe" style="height: 280px;"></canvas>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      {{-- Produk terbaru --}}
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header border-0 d-flex justify-content-between align-items-center">
            <h3 class="card-title"><i class="fas fa-box mr-2 text-info"></i>Produk Terbaru</h3>
            <a href="#" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Tambah</a>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap mb-0">
              <thead class="thead-light">
                <tr>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Tipe</th>
                  <th>Harga</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Aplikasi Kasir Berbasis Laravel</td>
                  <td>Laravel</td>
                  <td><span class="badge badge-success">Gratis</span></td>
                  <td>-</td>
                  <td><span class="badge badge-success">Aktif</span></td>
                </tr>
                <tr>
                  <td>Sistem Absensi QR Code</td>
                  <td>PHP</td>
                  <td><span class="badge badge-warning">Premium</span></td>
                  <td>Rp 50.000</td>
                  <td><span class="badge badge-success">Aktif</span></td>
                </tr>
                <tr>
                  <td>Sistem Informasi Surat Masuk</td>
                  <td>PHP</td>
                  <td><span class="badge badge-warning">Premium</span></td>
                  <td>Rp 75.000</td>
                  <td><span class="badge badge-secondary">Tidak Aktif</span></td>
                </tr>
                <tr>
                  <td>Template Admin Bootstrap 5</td>
                  <td>Bootstrap</td>
                  <td><span class="badge badge-success">Gratis</span></td>
                  <td>-</td>
                  <td><span class="badge badge-success">Aktif</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      {{-- Pembelian terbaru --}}
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header border-0">
            <h3 class="card-title"><i class="fas fa-shopping-cart mr-2 text-warning"></i>Pembelian Terbaru</h3>
          </div>
          <div class="card-body p-0">
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="font-weight-bold">Sistem Absensi QR Code</div>
                  <small class="text-muted">Budi Santoso · 2 jam lalu</small>
                </div>
                <span class="badge badge-warning">Rp 50.000</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="font-weight-bold">Sistem Informasi Surat Masuk</div>
                  <small class="text-muted">Siti Aminah · 5 jam lalu</small>
                </div>
                <span class="badge badge-warning">Rp 75.000</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                  <div class="font-weight-bold">E-Commerce Distro</div>
                  <small class="text-muted">Andi Pratama · kemarin</small>
                </div>
                <span class="badge badge-warning">Rp 100.000</span>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="{{ url('backend/plugins/chart.js/Chart.min.js') }}"></script>
<script>
$(function () {
  new Chart(document.getElementById('grafik-produk'), {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
      datasets: [{
        label: 'Dilihat',
        data: [320,410,380,520,610,580,690,720,650,780,830,900],
        borderColor: '#17a2b8',
        backgroundColor: 'rgba(23,162,184,.15)',
        fill: true, tension: .35
      }, {
        label: 'Pembelian',
        data: [12,18,15,25,31,28,36,40,33,44,48,55],
        borderColor: '#28a745',
        backgroundColor: 'rgba(40,167,69,.1)',
        fill: true, tension: .35
      }]
    },
    options: {
      maintainAspectRatio: false,
      legend: { position: 'bottom' },
      scales: { yAxes: [{ ticks: { beginAtZero: true } }] }
    }
  });

  new Chart(document.getElementById('grafik-tipe'), {
    type: 'doughnut',
    data: {
      labels: ['Gratis','Premium'],
      datasets: [{ data: [86,42], backgroundColor: ['#28a745','#ffc107'] }]
    },
    options: {
      maintainAspectRatio: false,
      legend: { position: 'bottom' }
    }
  });
});
</script>
@endpush