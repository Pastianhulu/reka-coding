@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h5>Tambah Kategori</h5>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Kategori - Create</li>
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
            <h3 class="card-title">Form Tambah Kategori</h3>
          </div>
          
          <form action="{{ url('admin/kategori') }}" method="POST">
            @csrf
            <div class="card-body">
                    
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Kategori " 
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback" style="display: block">
                    {{ $message }}
                </div>
                @enderror
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" onclick="MatikanForm(this);" class="btn btn-success fa fa-save"> Simpan </button>
              <a href="{{ url('admin/kategori') }}" class="btn btn-default float-right"> 
                <i class="fas fa-undo-alt"></i> Kembali
              </a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection