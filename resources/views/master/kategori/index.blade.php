@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h4>Data Kategori</h4>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Kategori</li>
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
            <a href="{{ url('admin/kategori/create') }}" class="btn btn-info"> 
              <i class="fas fa-plus-circle"> </i> Tambah </a>
            <div class="card-tools">
              <form action="{{ url('admin/kategori') }}" method="GET">
                <div class="input-group input-group-sm">
                  <input type="text" name="cari" placeholder="Cari Nama" class="form-control">
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
                  <th>Nama Kategori</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($kategoris as $no => $kategori)
                <tr>
                  <td>{{ ++$no + ($kategoris->currentPage()-1) * $kategoris->perPage() }}</td>
                  <td>{{ $kategori->name }}</td>
                  <td class="text-right">
                    <a href="{{ url('admin/kategori/'.$kategori->id.'/edit') }}" class="btn btn-sm btn-info">
                      <i class="fa fa-edit"> </i> Edit
                    </a>
                      <button class="btn btn-sm btn-danger" onclick="deleteData({{ $kategori->id }}, '{{ url('admin/kategori') }}', 'Kategori')">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <ul class="pagination pagination-month justify-content-center">
            {{ $kategoris->links() }}
          </ul>
        </div>
      </div>
    </div>  
  </div>
</div>
@endsection