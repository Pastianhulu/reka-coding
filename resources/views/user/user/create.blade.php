@extends('layouts/backend')
@section('content-header')

<section class="content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-6">
            <h5>Tambah User</h5>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
               <li class="breadcrumb-item active">User - Create</li>
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
                  <h3 class="card-title">Form Tambah User</h3>
               </div>

               <form action="{{ route('user.store') }}" method="POST">
                  @csrf
                  <div class="card-body">

                     <div class="row">
                        <div class="form-group col-md-6">
                           <label>Nama Lengkap</label>
                           <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama User"
                              class="form-control @error('name') is-invalid @enderror">
                           @error('name')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>

                        <div class="form-group col-md-6">
                           <label>Email / Username</label>
                           <input type="text" name="email" value="{{ old('email') }}" placeholder="Email / Username"
                              class="form-control @error('email') is-invalid @enderror">
                           @error('email')
                           <div class="invalid-feedback">{{ $message }}</div>
                           @enderror
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Password</label>
                              <input type="password" name="password" placeholder="Masukkan Password"
                                 class="form-control @error('password') is-invalid @enderror">
                              @error('password')
                              <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label>Ulangi Password</label>
                              <input type="password" name="password_confirmation"
                                 placeholder="Masukkan Konfirmasi Password" class="form-control">
                           </div>
                        </div>
                     </div>

                     <div class="form-group">
                        <label class="font-weight-bold">Batas Hak Akses</label>
                        <br>
                        @foreach ($roles as $role)
                        <div class="form-check form-check-inline">
                           <input class="form-check-input @error('role') is-invalid @enderror" type="checkbox"
                              name="role[]" value="{{ $role->name }}" id="check-{{ $role->id }}" {{
                              is_array(old('role')) && in_array($role->name, old('role')) ? 'checked' : '' }}>
                           <label class="form-check-label" for="check-{{ $role->id }}">
                              {{ $role->name }}
                           </label>
                        </div>
                        @endforeach
                        @error('role')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                     </div>

                  </div>
                  <div class="card-footer">
                     <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                     </button>
                     <a href="{{ url('admin/user') }}" class="btn btn-default float-right">
                        <i class="fas fa-undo-alt"></i> Kembali
                     </a>
                  </div>
               </form>
            </div>

         </div>
      </div>
   </div>
</div>

@stop