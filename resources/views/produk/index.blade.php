@extends('layouts.backend')
@section('content-header')

<section class="content-header">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-6">
            <h4>Data Produk</h4>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
               <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
               <li class="breadcrumb-item active">Produk</li>
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
                  <a href="{{ url('admin/produk/create') }}" class="btn btn-info btn-sm">
                     <i class="fas fa-plus-circle"></i> Tambah
                  </a>
               </div>
               <div class="col-sm-3"></div>
               <form action="{{ url('admin/produk') }}" method="GET" class="col-sm-7">
                  <div class="row">
                     <div class="col-sm-3">
                        <div class="input-group input-group-sm">
                           <select name="status" class="form-control form-control-sm">
                              <option value="">-</option>
                              <option value="Y">AKTIF</option>
                              <option value="T">TIDAK</option>
                             
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-3">
                        <div class="input-group input-group-sm">
                           <select name="tipe" class="form-control form-control-sm">
                              <option value="">-</option>
                              <option value="gratis">GRATIS</option>
                              <option value="premium">PREMIUM</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="input-group">
                           <input type="text" name="cari"  value="{{ request('cari') }}" class="form-control" placeholder="Cari judul" autocomplete="off"/>
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
                     <table class="table table-bordered table-hover" id="example1">
                        <thead>
                           <tr>
                              <th style="width: 1%">No</th>
                              <th>Judul Produk</th>
                              <th>Developer</th>
                              <th>Kategori</th>
                              <th>Tipe</th>
                              <th>Harga</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @foreach ($produks as $produk)
                           <tr>
                              <td>{{ $loop->iteration + ($produks->currentPage() - 1) * $produks->perPage() }}</td>
                              <td>{{ $produk->judul }}</td>
                              <td>{{ $produk->developer_name ?? '-' }}</td>
                              <td>{{ $produk->kategori_name ?? '-' }}</td>
                              <td>
                                 @if ($produk->tipe === 'gratis')
                                 <span class="btn btn-sm btn-success">Gratis</span>
                                 @else
                                 <span class="btn btn-sm btn-warning">Premium</span>
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
                                 @if($produk->status == 'Y')
                                 <button class="btn btn-sm btn-info">Aktif</button>
                                 @else
                                 <button class="btn btn-sm btn-danger">Tidak Aktif</button>
                                 @endif
                              </td>
                              <td class="text-right">
                                 <a href="{{ url('admin/produk/'.$produk->id.'/edit') }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-pen"></i> Edit
                                 </a>
                                 <button class="btn btn-sm btn-danger"
                                    onclick="deleteData({{ $produk->id }}, '{{ url('admin/produk') }}', 'Produk')">
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
               {{ $produks->links() }}
            </div>
         </div>
      </div>
   </div>
</div>

@endsection