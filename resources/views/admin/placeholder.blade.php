@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h4>{{ $title ?? 'Halaman' }}</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">{{ $title ?? 'Halaman' }}</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="content">
  <div class="container-fluid">
    <div class="alert alert-info">
      Halaman {{ $title ?? 'ini' }} belum tersedia.
    </div>
  </div>
</div>

@endsection
