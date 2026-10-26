@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h4>Daftar Produk</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Daftar Produk</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <form action="{{ route('produk.index') }}" method="GET" class="form-inline d-flex flex-wrap align-items-center">
              <select name="status" class="form-control form-control-sm mr-2 mb-1" style="width: 130px;">
                <option value="" {{ request()->query('status', 'Y') === '' ? 'selected' : '' }}>Semua Status</option>
                <option value="Y" {{ request()->query('status', 'Y') === 'Y' ? 'selected' : '' }}>Aktif</option>
                <option value="T" {{ request()->query('status', 'Y') === 'T' ? 'selected' : '' }}>Tidak Aktif</option>
              </select>

              <select name="id_kategori" class="form-control form-control-sm mr-2 mb-1" style="width: 170px;">
                <option value="">Semua Kategori</option>
                @foreach ($kategoris as $kategori)
                  <option value="{{ $kategori->id }}" {{ (string) request('id_kategori') === (string) $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->name }}
                  </option>
                @endforeach
              </select>

              <select name="tipe" class="form-control form-control-sm mr-2 mb-1" style="width: 130px;">
                <option value="">Semua Tipe</option>
                <option value="gratis" {{ request('tipe') === 'gratis' ? 'selected' : '' }}>Gratis</option>
                <option value="premium" {{ request('tipe') === 'premium' ? 'selected' : '' }}>Premium</option>
              </select>

              @if (request()->filled('cari') || request()->filled('tipe') || request()->filled('id_kategori') || request()->filled('status'))
                <a href="{{ route('produk.index') }}" class="btn btn-sm btn-default mb-1">
                  <i class="fas fa-times"></i> Reset
                </a>
              @endif

              <div class="input-group input-group-sm ml-auto mb-1" style="width: 260px;">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul produk" class="form-control">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-info btn-flat" title="Cari">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width: 45px;">No</th>
                    <th>Judul</th>
                    <th>Developer</th>
                    <th>Kategori</th>
                    <th>Tipe</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th style="width: 180px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($produks as $produk)
                    <tr>
                      <td>{{ $loop->iteration + ($produks->currentPage() - 1) * $produks->perPage() }}</td>
                      <td>{{ $produk->judul }}</td>
                      <td>{{ $produk->developer_name ?? '-' }}</td>
                      <td>{{ $produk->kategori_name ?? '-' }}</td>
                      <td>
                        @if ($produk->tipe === 'gratis')
                          <span class="badge badge-success">Gratis</span>
                        @else
                          <span class="badge badge-warning">Premium</span>
                        @endif
                      </td>
                      <td>
                        @if ($produk->tipe === 'premium')
                          Rp {{ number_format((int) $produk->harga, 0, ',', '.') }}
                        @else
                          -
                        @endif
                      </td>
                      <td>
                        @if ($produk->status === 'Y')
                          <span class="badge badge-success">Aktif</span>
                        @else
                          <span class="badge badge-secondary">Tidak Aktif</span>
                        @endif
                      </td>
                      <td class="text-right">
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-sm btn-warning">
                          <i class="fas fa-edit"></i> Edit
                        </a>
                        <button class="btn btn-sm btn-danger" onclick="deleteData({{ $produk->id }}, '{{ url('admin/produk') }}', 'Produk')">
                          <i class="fas fa-trash"></i> Hapus
                        </button>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="8" class="text-center text-muted">Belum ada produk.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>

          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              {{ $produks->links() }}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
