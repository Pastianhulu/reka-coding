@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h4>Tambah Produk</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('produk.index') }}">Daftar Produk</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">Form Tambah Produk</h3>
          </div>

          @include('produk._form', [
            'action' => route('produk.store'),
            'method' => 'POST',
            'produk' => null,
            'galeri' => collect(),
          ])
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
