@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h4>Data Pembelian</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Pembelian</li>
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
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th style="width: 50px;">No</th>
                    <th>Pembeli</th>
                    <th>Produk</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th style="width: 140px;">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($pembelians as $pembelian)
                    <tr>
                      <td>{{ $loop->iteration + ($pembelians->currentPage() - 1) * $pembelians->perPage() }}</td>
                      <td>
                        {{ $pembelian->user_name }}
                        <div class="text-muted small">{{ $pembelian->email }}</div>
                      </td>
                      <td>{{ $pembelian->judul }}</td>
                      <td>Rp {{ number_format((int) $pembelian->harga, 0, ',', '.') }}</td>
                      <td>
                        @if ($pembelian->status === 'lunas')
                          <span class="badge badge-success">Lunas</span>
                        @else
                          <span class="badge badge-warning">Pending</span>
                        @endif
                      </td>
                      <td>{{ \Carbon\Carbon::parse($pembelian->created_at)->format('d M Y H:i') }}</td>
                      <td>
                        @if ($pembelian->status !== 'lunas')
                          <form action="{{ route('pembelian.lunas', $pembelian->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Tandai pembelian ini lunas?')">
                              Tandai Lunas
                            </button>
                          </form>
                        @else
                          <span class="text-muted small">-</span>
                        @endif
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7" class="text-center text-muted">Belum ada pembelian.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
              {{ $pembelians->links() }}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
