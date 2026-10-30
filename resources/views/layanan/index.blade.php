@extends('layouts.backend')
@section('content-header')

<section class="content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-6">
            <h4>Data Layanan</h4>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
               <li class="breadcrumb-item active">Layanan</li>
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
                  <a href="{{ url('admin/layanan/create') }}" class="btn btn-info btn-sm">
                     <i class="fas fa-plus-circle"></i> Tambah
                  </a>
               </div>
               <div class="col-sm-3"></div>
               <form action="{{ url('admin/layanan') }}" method="GET" class="col-sm-7">
                  <div class="row">
                     <div class="col-sm-3">
                        <div class="input-group input-group-sm">
                           <select name="status" class="form-control form-control-sm">
                              <option value="">Semua Status</option>
                              <option value="Y">AKTIF</option>
                              <option value="T">TIDAK AKTIF</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-9">
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
                              <th>Judul Layanan</th>
                              {{-- <th>Deskripsi</th> --}}
                              <th style="width: 5%">Urutan</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @forelse ($layanans as $layanan)
                           <tr>
                              <td>{{ $loop->iteration + ($layanans->currentPage() - 1) * $layanans->perPage() }}</td>
                              <td>{{ $layanan->judul }}</td>
                              {{-- <td>{{ Str::limit($layanan->deskripsi, 100) }}</td> --}}
                              <td align="center"><span class="badge badge-secondary">{{ $layanan->urutan }}</span></td>
                              <td>
                                 @if ($layanan->status == 'Y')
                                 <button type="button" class="btn btn-sm btn-info">Aktif</button>
                                 @else
                                 <button type="button" class="btn btn-sm btn-danger">Tidak Aktif</button>
                                 @endif
                              </td>
                              <td class="text-right">
                                 <a href="{{ url('admin/layanan/'.$layanan->id.'/edit') }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-pen"></i> Edit
                                 </a>
                                 <button type="button" class="btn btn-sm btn-danger" onclick="deleteData({{ $layanan->id }}, '{{ url('admin/layanan') }}', 'Layanan')">
                                    <i class="fa fa-cut"></i> Hapus
                                 </button>
                              </td>
                           </tr>
                           @empty
                           <tr>
                              <td colspan="5" class="text-center">Belum ada data layanan.</td>
                           </tr>
                           @endforelse
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>

            <div class="d-flex justify-content-center">
               {{ $layanans->links() }}
            </div>
         </div>
      </div>
   </div>
</div>

@endsection