@extends('layouts.backend')
@section('content-header')

<section class="content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-6">
            <h5>Tambah Produk</h5>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url('admin/produk') }}">Daftar Produk</a></li>
               <li class="breadcrumb-item active">Produk - Create</li>
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
                   <a href="{{ url('admin/produk') }}" class="btn btn-info float-right">
                        <i class="fas fa-arrow-left"></i> Kembali
                     </a>
               </div>

               <form action="{{ url('admin/produk') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">

                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Judul Produk <span class="text-danger">*</span></label>
                              <input type="text" name="judul" value="{{ old('judul') }}" placeholder="Judul Produk" class="form-control">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
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
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Developer</label>
                              <input type="text" class="form-control" value="{{ auth()->user()->name }}" readonly>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Tipe <span class="text-danger">*</span></label>
                              <select name="tipe" class="form-control">
                                 <option value="">-</option>
                                 <option value="gratis" {{ old('tipe') === 'gratis' ? 'selected' : '' }}>GRATIS</option>
                                 <option value="premium" {{ old('tipe') === 'premium' ? 'selected' : '' }}>PREMIUM</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Harga (Rp)</label>
                              <input type="number" name="harga" value="{{ old('harga') }}" min="0" placeholder="Harga" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Status <span class="text-danger">*</span></label>
                              <select name="status" class="form-control">
                                 <option value="T" {{ old('status') === 'T' ? 'selected' : '' }}>TIDAK AKTIF</option>
                                 <option value="Y" {{ old('status') === 'Y' ? 'selected' : '' }}>AKTIF</option>
                              </select>
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <label>Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" class="textarea form-control" rows="10" placeholder="Deskripsi">{{ old('deskripsi') }}</textarea>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Link GitHub</label>
                              <input type="url" name="link_github" value="{{ old('link_github') }}" placeholder="Link Github" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Link Google Drive</label>
                              <input type="url" name="link_drive" value="{{ old('link_drive') }}" placeholder="Link Google Drive" class="form-control">
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
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Gambar Detail (SS)</label>
                              <input type="file" name="gambar[]" multiple accept="image/*" class="form-control">
                           </div>
                        </div>
                     </div>

                  </div>

                  <div class="card-footer">
                     <button type="submit" onclick="MatikanForm(this);" class="btn btn-success fa fa-save"> Simpan
                     </button>
                    
                  </div>
               </form>

            </div>
         </div>
      </div>
   </div>
</div>
@endsection