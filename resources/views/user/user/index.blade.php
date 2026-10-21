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
                            <a href="{{ url('user/create') }}" class="btn btn-success "> <i class="fas fa-plus-circle"> </i>
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
                                                        <label class="badge badge-info">{{ $role }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-pencil-alt"> Edit</i>
                                                </a>
                                                <button onClick="Delete(this.id)" class="btn btn-sm btn-warning" id="{{ $user->id }}">
                                                    <i class="fa fa-trash"> Hapus</i>
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

    <!--action delete -->

    <script>
        //ajax delete
        function Delete(id) {
            var id = id;
            var token = $("meta[name='csrf-token']").attr("content");

            swal({
                title: "APAKAH KAMU YAKIN ?",
                text: "INGIN MENGHAPUS DATA INI!",
                icon: "warning",
                buttons: [
                    'TIDAK',
                    'YA'
                ],
                dangerMode: true,
            }).then(function(isConfirm) {
                if (isConfirm) {

                    //ajax delete
                    jQuery.ajax({
                        url: "{{ route('user.index') }}/" + id,
                        data: {
                            "id": id,
                            "_token": token
                        },
                        type: 'DELETE',
                        success: function(response) {
                            if (response.status == "success") {
                                swal({
                                    title: 'BERHASIL!',
                                    text: 'DATA BERHASIL DIHAPUS!',
                                    icon: 'success',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: 'GAGAL!',
                                    text: 'DATA GAGAL DIHAPUS!',
                                    icon: 'error',
                                    timer: 1000,
                                    showConfirmButton: false,
                                    showCancelButton: false,
                                    buttons: false,
                                }).then(function() {
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
