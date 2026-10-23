@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h4>Data Cara Bayar</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Cara Bayar</li>
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
            <a href="{{ url('admin/cara-bayar/create') }}" class="btn btn-info"> 
              <i class="fas fa-plus-circle"></i> Tambah 
            </a>
            <div class="card-tools">
              <form action="{{ url('admin/cara-bayar') }}" method="GET">
                <div class="input-group input-group-sm">
                  <input type="text" name="cari" placeholder="Cari Nama Bank" class="form-control">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">Cari</button>
                  </span>
                </div>
              </form>
            </div>
          </div>

          <div class="card-body">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th style="width: 1%">No</th>
                  <th>Nama Bank / Wallet</th>
                  <th>Nomor Rekening</th>
                  <th>Atas Nama</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cara_bayars as $no => $cara_bayar)
                <tr>
                  <td>{{ ++$no + ($cara_bayars->currentPage()-1) * $cara_bayars->perPage() }}</td>
                  <td>{{ $cara_bayar->name }}</td>
                  <td>{{ $cara_bayar->nomor_rekening }}</td>
                  <td>{{ $cara_bayar->atas_nama }}</td>
                  <td>
                    @if($cara_bayar->status == 1)
                        <button class="btn btn-sm btn-success">Aktif</button>
                    @else
                        <button class="btn btn-sm btn-danger">Tidak Aktif</button>
                    @endif
                  </td>
                  <td class="text-right">
                    <a href="{{ url('admin/cara-bayar/'.$cara_bayar->id.'/edit') }}" class="btn btn-sm btn-info">
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <button class="btn btn-sm btn-danger" onclick="deleteData({{ $cara_bayar->id }}, '{{ url('admin/cara-bayar') }}', 'Cara Bayar')">
                      <i class="fa fa-trash"></i> Hapus
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <ul class="pagination pagination-month justify-content-center">
            {{ $cara_bayars->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection