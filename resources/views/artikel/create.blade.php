@extends('layouts.backend')
@section('content-header')

<section class="content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-6">
            <h5>Tambah Artikel</h5>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url('admin/artikel') }}">Daftar Artikel</a></li>
               <li class="breadcrumb-item active">Artikel - Create</li>
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
                  <h3 class="card-title">Form Tambah Artikel</h3>
                  <a href="{{ url('admin/artikel') }}" class="btn btn-info float-right">
                     <i class="fas fa-arrow-left"></i> Kembali
                  </a>
               </div>

               <form action="{{ url('admin/artikel') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">

                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Judul Artikel</label>
                              <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Judul Artikel" class="form-control">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label>Kategori</label>
                              <select name="id_kategori" class="form-control">
                                 <option value="">-</option>
                                 @foreach ($kategoris as $kategori)
                                 <option value="{{ $kategori->id }}" {{ old('id_kategori') == $kategori->id ? 'selected' : '' }}>{{ $kategori->name }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                         <div class="col-md-3">
                           <div class="form-group">
                              <label>Status</label>
                              <select name="status" class="form-control">
                                 <option value="T" {{ old('status') === 'T' ? 'selected' : '' }}>DRAFT</option>
                                 <option value="Y" {{ old('status') === 'Y' ? 'selected' : '' }}>TERBIT</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Devoloper</label>
                              <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Gambar Utama (Thumbnail)</label>
                              <input type="file" name="thumbnail" accept="image/*" class="form-control">
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <label>Konten</label>
                        <textarea name="konten" class="textarea form-control" rows="10" placeholder="Isi artikel">{{ old('konten') }}</textarea>
                     </div>
                  </div>

                  <div class="card-footer">
                     <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                     </button>
                  </div>
               </form>

            </div>
         </div>
      </div>
   </div>
</div>
@endsection