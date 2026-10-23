@extends('layouts.backend')
@section('content-header')

<section class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h4>Daftar Permissions</h4>
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
                      <i class="fa fa-edit"> </i> Edit
                    </a>
                      <button class="btn btn-sm btn-danger" onclick="hapusPermission({{ $permission->id }})">
                        <i class="fa fa-cut"></i> Hapus
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
@endsection

@push('scripts')
<script>
function hapusPermission(id) {
    Swal.fire({
        title: 'Yakin hapus?',
        text: 'Permission ini akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc3545',
    }).then((result) => {
        if (!result.isConfirmed) return;

        $.ajax({
            url: "{{ url('admin/permission') }}/" + id,
            type: 'DELETE',
            data: { _token: "{{ csrf_token() }}" },
            success: function (res) {
                if (res.status === 'success') {
                     toastr.success('Data sudah dihapus', 'Berhasil');
                    setTimeout(function(){ location.reload(); }, 1000);
                }
            },
            error: function () {
                Swal.fire('Gagal', 'Data tidak bisa dihapus', 'error');
            }
        });
    });
}
</script>
@endpush