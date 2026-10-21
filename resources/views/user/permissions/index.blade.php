@extends('layouts/backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h5>Daftar Permissions</h5>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('home') }}">Home</a></li>
          <li class="breadcrumb-item active">Permissions</li>
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

            <a href="{{ url('admin/permission/create') }}" class="btn btn-success "> 
              <i class="fas fa-plus-circle"> </i>Tambah </a>
            <div class="card-tools">
              <form action="{{ url('permission') }}" method="GET">
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
                  <th>Nama Permissions</th>
                  <th>Jenis</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($permissions as $no => $permission)
                <tr>
                  <td>{{ ++$no + ($permissions->currentPage()-1) * $permissions->perPage() }}</td>
                  <td>{{ $permission->name }}</td>
                  <td>{{ $permission->jenis }}</td>
                  <td class="text-right">
                    <a href="{{ route('permission.edit', $permission->id) }}" class="btn btn-sm btn-info">
                      <i class="fa fa-edit"> </i>
                    </a>
                    <button onClick="Delete(this.id)" class="btn btn-sm btn-danger" id="{{ $permission->id }}">
                      <i class="fa fa-cut"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <ul class="pagination pagination-month justify-content-center">
            {{ $permissions->links() }}
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function Delete(id) {
    var id = id;
    var token = $("meta[name='csrf-token']").attr("content");

    swal({
      title: "Aplakah Kamu Yakin",
      text: "Data ini di Hapus",
      icon: "warning",
      buttons: [
        'Tidak',
        'Ya Setuju'
      ],
      dangerMode: true,

    }).then(function (isConfirm) {
      if (isConfirm) {
        jQuery.ajax({
          url: "{{ route("permission.index") }}/"+id,
          data: {
            "id": id,
            "_token": token
          },
          type: 'DELETE',
          success: function (response) {
            if (response.status == "success") {
              swal({
                title: 'Sukses',
                text: 'Berhasil di Hapus',
                icon: 'success',
                timer: 1000,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
              }).then(function () {
                location.reload();
              });
            } else {
              swal({
                title: 'Gagal..!',
                text: 'Data Anda Gagal di Hapus',
                icon: 'error',
                timer: 1000,
                showConfirmButton: false,
                showCancelButton: false,
                buttons: false,
              }).then(function () {
                location.reload();
              });
            }
          }
        });

      } else {
        return true;
      }
    })
  }
</script>

@stop