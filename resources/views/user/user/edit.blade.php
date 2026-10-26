@extends('layouts.backend')
@section('content-header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('admin/user') }}">Users</a></li>
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
                        <h3 class="card-title"><i class="fas fa-edit mr-1"></i> Form Edit User</h3>
                    </div>
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <!-- Baris 1: Nama & Email -->
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                                        placeholder="Masukkan Nama User"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label>Email / Username</label>
                                    <input type="text" name="email" value="{{ old('email', $user->email) }}"
                                        placeholder="Email / Username"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            @if ($user->hasRole('member'))
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Membership Aktif Sampai</label>
                                            <div class="input-group">
                                                <input type="datetime-local" name="membership_until" id="membership_until"
                                                    value="{{ old('membership_until', optional($user->membership_until)->format('Y-m-d\TH:i')) }}"
                                                    class="form-control @error('membership_until') is-invalid @enderror">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="document.getElementById('membership_until').value = '{{ ($user->membership_until && $user->membership_until->isFuture() ? $user->membership_until->copy() : now())->addDays(30)->format('Y-m-d\TH:i') }}'">
                                                        +30 Hari
                                                    </button>
                                                </div>
                                            </div>
                                            <small class="text-muted">Kosongkan jika belum aktif. Tombol +30 Hari dihitung dari tanggal berakhir lama.</small>
                                            @error('membership_until')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Baris 2: Password -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Masukkan Password Baru"
                                            class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ulangi Password</label>
                                        <input type="password" name="password_confirmation"  placeholder="Ulangi Password Baru" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Hak Akses (Role)</label>
                                <br>
                                @foreach ($roles as $role)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input @error('role') is-invalid @enderror" type="checkbox" name="role[]" value="{{ $role->name }}" id="check-{{ $role->id }}" 
                                    {{ in_array($role->name, old('role', $user->getRoleNames()->toArray())) ? 'checked' : '' }}>
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
                                <i class="fas fa-save"></i> Simpan Perubahan
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

@endsection