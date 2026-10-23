@extends('layouts/backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Permission</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ url('admin/permission') }}">Permissions</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12"> 
        <div class="card card-primary card-outline shadow-sm">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-edit mr-1"></i> Form Edit Permission</h3>
          </div>
          <form action="{{ route('permission.update', $permission->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="card-body">
              
              <!-- Input Nama -->
              <div class="form-group">
                <label for="name">Nama Permission</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"  id="name" value="{{ old('name', $permission->name) }}" placeholder="Masukkan nama permission" required>
                @error('name')
                  <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

              <!-- Input Jenis -->
              <div class="form-group">
                <label for="jenis">Jenis</label>
                <input type="text" name="jenis" class="form-control @error('jenis') is-invalid @enderror"  id="jenis" value="{{ old('jenis', $permission->jenis) }}" placeholder="Masukkan jenis" required>
                @error('jenis')
                  <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-info">
                <i class="fas fa-save"></i> Simpan
              </button>
              <a href="{{ url('admin/permission') }}" class="btn btn-default float-right">
                <i class="fa fa-undo"></i> Kembali
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection