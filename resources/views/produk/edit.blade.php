@extends('layouts.backend')
@section('content-header')

<section class="content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-6">
            <h5>Edit Produk</h5>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
               <li class="breadcrumb-item"><a href="{{ url('admin/produk') }}">Daftar Produk</a></li>
               <li class="breadcrumb-item active">Produk - Edit</li>
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
                  <h3 class="card-title">Form Edit Produk</h3>
                  <a href="{{ url('admin/produk') }}" class="btn btn-info float-right">
                     <i class="fas fa-arrow-left"></i> Kembali
                  </a>
               </div>

               <form action="{{ url('admin/produk/'.$produk->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="card-body">

                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label>Judul Produk</label>
                              <input type="text" name="judul" value="{{ old('judul', $produk->judul) }}" placeholder="Judul Produk" class="form-control">
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
                                 <option value="{{ $kategori->id }}" {{ old('id_kategori', $produk->id_kategori) == $kategori->id ? 'selected' : '' }}>{{ $kategori->name }}</option>
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
                              <label>Tipe</label>
                              <select name="tipe" class="form-control">
                                 <option value="">-</option>
                                 <option value="gratis" {{ old('tipe', $produk->tipe) === 'gratis' ? 'selected' : '' }}>GRATIS</option>
                                 <option value="premium" {{ old('tipe', $produk->tipe) === 'premium' ? 'selected' : '' }}>PREMIUM</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Harga (Rp)</label>
                              <input type="number" name="harga" value="{{ old('harga', $produk->harga) }}" min="0" placeholder="Harga" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <label>Status</label>
                              <select name="status" class="form-control">
                                 <option value="T" {{ old('status', $produk->status) === 'T' ? 'selected' : '' }}>TIDAK AKTIF</option>
                                 <option value="Y" {{ old('status', $produk->status) === 'Y' ? 'selected' : '' }}>AKTIF</option>
                              </select>
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="textarea form-control" rows="10" placeholder="Deskripsi">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Link GitHub</label>
                              <input type="url" name="link_github" value="{{ old('link_github', $produk->link_github) }}" placeholder="Link Github" class="form-control">
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Link Google Drive</label>
                              <input type="url" name="link_drive" value="{{ old('link_drive', $produk->link_drive) }}" placeholder="Link Google Drive" class="form-control">
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Gambar Utama (Thumbnail)</label>
                              <input type="file" name="thumbnail" accept="image/*" class="form-control">
                             @if ($produk->thumbnail)
                                <img src="{{ asset($produk->thumbnail) }}" class="img-thumbnail mt-2" width="100" height="100">
                              @endif
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Gambar Detail (SS)</label>
                              <input type="file" name="gambar[]" multiple accept="image/*" class="form-control">
                           </div>
                        </div>
                     </div>

                     @if ($galeri->count())
                        <div class="form-group mt-3">
                           <label>Gambar Detail Saat Ini</label>
                           <div id="galeri-sortable" class="row">
                              @foreach ($galeri as $gambar)
                             <div class="col-4 col-md-2 mb-2" data-id="{{ $gambar->id }}" id="gambar-{{ $gambar->id }}">
                                  <div class="position-relative border rounded overflow-hidden" style="height: 80px;">
                                      <img src="{{ asset($gambar->path) }}" class="w-100 h-100 object-fit-cover">
                                      <button type="button" class="btn btn-sm text-danger position-absolute galeri-hapus" style="top:0;right:0" data-id="{{ $gambar->id }}">
                                        <i class="fas fa-times"></i>
                                      </button>
                                  </div>
                                </div>
                              @endforeach
                           </div>
                        </div>
                     @endif

                  </div>

                  <div class="card-footer">
                     <button type="submit" onclick="MatikanForm(this);" class="btn btn-success fa fa-save"> Simpan</button>
                  </div>
               </form>

            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@push('scripts')
<script>
$(function () {
    $(document).on('click', '.galeri-hapus', function () {
        var id = $(this).data('id');
        var $item = $('#gambar-' + id);

        $.ajax({
            url: "{{ url('admin/produk/gambar') }}/" + id,
            type: 'DELETE',
            data: { _token: "{{ csrf_token() }}" },
            success: function (res) {
                if (res.status === 'success') {
                    $item.remove();
                    // Tambahkan judul 'Berhasil' dan timeout 3000ms (3 detik)
                    toastr.success('Gambar berhasil dihapus.', 'Berhasil', {timeOut: 3000});
                }
            },
            error: function () {
                // Tambahkan judul 'Gagal' dan timeout 5000ms (5 detik)
                toastr.error('Gagal menghapus gambar.', 'Gagal', {timeOut: 5000});
            }
        });
    });
});
</script>
@endpush