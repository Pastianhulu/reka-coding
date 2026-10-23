@extends('layouts/backend')
@section('content-header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h4>Daftar User</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                            <a href="{{ url('admin/user/create') }}" class="btn btn-success "> <i class="fas fa-plus-circle"> </i>
                                Tambah </a>
                            <div class="card-tools">
                                <form action="{{ url('user') }}" method="GET">
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
                            <table class="table table-bordered table-responsive table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 1%">No</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Hak Akses</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $no => $user)
                                        <tr>
                                            <td>{{ ++$no + ($users->currentPage() - 1) * $users->perPage() }}
                                            </td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $role)
                                                        <label class="badge badge-success">{{ $role }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil-alt"> Edit</i>
                                                </a>
                                                 <button class="btn btn-sm btn-danger" onclick="Delete({{ $user->id }})">
                                                    <i class="fa fa-cut"></i> Hapus
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination pagination-month justify-content-center">
                            {{ $users->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script>
function Delete(id) {
    Swal.fire({
        title: 'Yakin hapus?',
        text: 'User ini akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc3545',
    }).then((result) => {
        if (!result.isConfirmed) return;

        $.ajax({
            url: "{{ url('admin/user') }}/" + id,
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
@stop