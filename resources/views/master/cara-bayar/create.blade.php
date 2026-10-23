@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h5>Tambah Cara Bayar</h5>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Cara Bayar - Create</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-6">
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">Form Tambah Cara Bayar</h3>
          </div>
          
          <form action="{{ url('admin/cara-bayar') }}" method="POST">
            @csrf
            <div class="card-body">
                    
               <div class="form-group">
                <label>Nama</label>
                <input type="text" name="atas_nama" value="{{ old('atas_nama') }}" placeholder="Nama Pemilik Rekening" 
                       class="form-control @error('atas_nama') is-invalid @enderror">
                @error('atas_nama')
                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Nama Bank / Dompet Digital</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="BCA, Mandiri, Dana" 
                       class="form-control @error('name') is-invalid @enderror">
                @error('name')
                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label>Nomor Rekening / Nomor HP</label>
                <input type="text" name="nomor_rekening" value="{{ old('nomor_rekening') }}" placeholder="1234567890" 
                       class="form-control @error('nomor_rekening') is-invalid @enderror">
                @error('nomor_rekening')
                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                @enderror
              </div>

             

              <div class="form-group">
                <label>Status</label>
                <div class="form-check mt-2">
                  <input type="hidden" name="status" value="">
                  <input type="checkbox" name="status" value="1" class="form-check-input" id="status" {{ old('status') == '1' ? 'checked' : '' }}>
                  <label class="form-check-label" for="status">Aktifkan </label>
                </div>
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" onclick="MatikanForm(this);" class="btn btn-success fa fa-save"> Simpan </button>
              <a href="{{ url('admin/cara-bayar') }}" class="btn btn-default float-right"> 
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