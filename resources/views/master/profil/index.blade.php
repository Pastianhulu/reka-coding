@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h5>Pengaturan Profil Web</h5>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Profil Web</li>
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
            <h3 class="card-title">Form Profil Web</h3>
          </div>
          
          <form action="{{ route('profil.update', $profil->id ?? 0) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Website</label>
                    <input type="text" name="website" value="{{ old('website', $profil->website) }}" placeholder="REKA CODING" 
                           class="form-control @error('website') is-invalid @enderror">
                    @error('website')
                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Developer</label>
                    <input type="text" name="developer" value="{{ old('developer', $profil->developer) }}" placeholder="Pastian Hulu" 
                           class="form-control @error('developer') is-invalid @enderror">
                    @error('developer')
                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email Kontak</label>
                    <input type="email" name="email" value="{{ old('email', $profil->email) }}" placeholder="admin@rekacoding.com" 
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nomor WhatsApp</label>
                    <input type="text" name="whatsapp" value="{{ old('whatsapp', $profil->whatsapp) }}" placeholder="08123456789" 
                           class="form-control @error('whatsapp') is-invalid @enderror">
                    @error('whatsapp')
                    <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Alamat Fisik</label>
                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap">{{ old('alamat', $profil->alamat) }}</textarea>
              </div>

              <div class="form-group">
                <label>Harga Membership (Rp)</label>
                <input type="number" name="harga_membership" value="{{ old('harga_membership', $profil->harga_membership) }}" min="0" placeholder="Contoh: 100000" class="form-control @error('harga_membership') is-invalid @enderror">
                @error('harga_membership')
                <div class="invalid-feedback" style="display: block">{{ $message }}</div>
                @enderror
              </div>

              <div class="alert alert-secondary mt-4">
                <i class="fas fa-share-alt"></i> Media Sosial
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Instagram</label>
                    <input type="text" name="instagram" value="{{ old('instagram', $profil->instagram) }}" placeholder="https://instagram.com/username" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>YouTube</label>
                    <input type="text" name="youtube" value="{{ old('youtube', $profil->youtube) }}" placeholder="https://youtube.com/..." class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>TikTok</label>
                    <input type="text" name="tiktok" value="{{ old('tiktok', $profil->tiktok) }}" placeholder="https://tiktok.com/@username" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Facebook</label>
                    <input type="text" name="facebook" value="{{ old('facebook', $profil->facebook) }}" placeholder="https://facebook.com/..." class="form-control">
                  </div>
                </div>
              </div>

            </div>

            <div class="card-footer">
              <button type="submit" onclick="KunciTombol(this);" class="btn btn-success">
                <i class="fa fa-spinner"></i> Simpan Perubahan 
              </button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection