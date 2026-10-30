@extends('layouts.backend')
@section('content-header')

<section class="content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-6">
            <h4>Data Artikel</h4>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
               <li class="breadcrumb-item active">Artikel</li>
            </ol>
         </div>
      </div>
   </div>
</section>

<div class="content">
   <div class="container-fluid">
      <div class="card">
         <div class="card-body">
            <div class="row">
               <div class="col-sm-2">
                  <a href="{{ url('admin/artikel/create') }}" class="btn btn-info btn-sm">
                     <i class="fas fa-plus-circle"></i> Tambah
                  </a>
               </div>
               <div class="col-sm-3"></div>
               <form action="{{ url('admin/artikel') }}" method="GET" class="col-sm-7">
                  <div class="row">
                     <div class="col-sm-3">
                        <div class="input-group input-group-sm">
                           <select name="id_kategori" class="form-control form-control-sm">
                              <option value="">Semua Kategori</option>
                              @foreach ($kategoris as $kategori)
                              <option value="{{ $kategori->id }}" {{ request('id_kategori') == $kategori->id ? '' : '' }}>{{ $kategori->name }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="input-group input-group-sm">
                           <select name="status" class="form-control form-control-sm">
                              <option value="">Semua Status</option>
                              <option value="Y">TERBIT</option>
                              <option value="T">DRAFT</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="input-group">
                           <input type="text" name="cari" value="{{ request('cari') }}" class="form-control" placeholder="Cari judul" autocomplete="off"/>
                           <span class="input-group-append">
                              <button type="submit" class="btn btn-info"><i class="fa fa-search"></i> Cari</button>
                           </span>
                        </div>
                     </div>
                  </div>
               </form>
            </div>

            <hr>

            <div class="row">
               <div class="col-sm-12">
                  <div class="table-responsive">
                     <table class="table table-bordered table-hover">
                        <thead>
                           <tr>
                              <th style="width: 1%">No</th>
                              <th>Judul Artikel</th>
                              <th>Devoloper</th>
                              <th>Kategori</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($artikels as $artikel)
                           <tr>
                              <td>{{ $loop->iteration + ($artikels->currentPage() - 1) * $artikels->perPage() }}</td>
                              <td>{{ $artikel->judul }}</td>
                              <td>{{ $artikel->developer ?? '-' }}</td>
                              <td>{{ $artikel->kategori ?? '-' }}</td>
                              <td>
                                 @if ($artikel->status == 'Y')
                                 <button type="button" class="btn btn-sm btn-info">Terbit</button>
                                 @else
                                 <button type="button" class="btn btn-sm btn-danger">Draft</button>
                                 @endif
                              </td>
                              <td class="text-right">
                                 <a href="{{ url('admin/artikel/'.$artikel->id.'/edit') }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-pen"></i> Edit
                                 </a>
                                 <button type="button" class="btn btn-sm btn-danger"
                                    onclick="deleteData({{ $artikel->id }}, '{{ url('admin/artikel') }}', 'Artikel')">
                                    <i class="fa fa-cut"></i> Hapus
                                 </button>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class="d-flex justify-content-center">
               {{ $artikels->links() }}
            </div>
         </div>
      </div>
   </div>
</div>

@endsection