@extends('layouts.backend')
@section('content-header')

<section class="content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-6">
            <h5>Edit Layanan</h5>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url('admin/layanan') }}">Daftar Layanan</a></li>
               <li class="breadcrumb-item active">Layanan - Edit</li>
            </ol>
         </div>
      </div>
   </div>
</section>

<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="card card-warning card-outline">
               <div class="card-header">
                  <h3 class="card-title">Form Edit Layanan</h3>
                  <a href="{{ url('admin/layanan') }}" class="btn btn-info float-right">
                     <i class="fas fa-arrow-left"></i> Kembali
                  </a>
               </div>

               <form action="{{ url('admin/layanan/'.$layanan->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="card-body">

                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Judul Layanan</label>
                              <input type="text" name="judul" value="{{ old('judul', $layanan->judul) }}" placeholder="Judul Layanan" class="form-control">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Status</label>
                              <select name="status" class="form-control">
                                 <option value="T" {{ old('status', $layanan->status) === 'T' ? 'selected' : '' }}>TIDAK AKTIF</option>
                                 <option value="Y" {{ old('status', $layanan->status) === 'Y' ? 'selected' : '' }}>AKTIF</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Urutan</label>
                              <input type="number" name="urutan" value="{{ old('urutan', $layanan->urutan) }}" min="0" class="form-control">
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="textarea form-control" rows="5" placeholder="Deskripsi layanan">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                     </div>

                     <div class="form-group">
                        <label>Fitur</label>
                        <textarea name="fitur" class="form-control" rows="6" placeholder="Satu fitur per baris">{{ old('fitur', $layanan->fitur) }}</textarea>
                        <small class="text-muted">Tulis satu fitur per baris.</small>
                     </div>

                  </div>

                  <div class="card-footer">
                     <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan Perubahan
                     </button>
                  </div>
               </form>

            </div>
         </div>
      </div>
   </div>
</div>
@endsection