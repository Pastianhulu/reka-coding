
    @extends('layouts/backend')
    @section('content-header')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h5>Tambah Roles</h5>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item"><a href="{{url('home') }}">Home</a></li>

              <li class="breadcrumb-item active">Role - Create</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">

        <div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">FORM TAMBAH ROLES</h3>
              </div>
              <form action="{{ route('role.store') }}" method="POST">
              @csrf
                <div class="card-body">
                        <div class="form-group">
                            <label>Nama Role</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Role"
                                class="form-control @error('title') is-invalid @enderror">

                            @error('name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">PERMISSIONS</label>
                            <br>
                            @foreach ($permissions as $permission)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="check-{{ $permission->id }}">
                                <label class="form-check-label" for="check-{{ $permission->id }}">
                                {{ $permission->name }}
                                    </div>
                            @endforeach
                        </div>
                  
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" onclick="MatikanForm(this);" class="btn btn-success fa fa-save"> Simpan </button>
                    <a href="{{ url('admin/role') }}" class="btn btn-default float-right"> 
                     <i class="fas fa-undo-alt">  </i>
                      Kembali
                    </a>
                    
                </div>

              </form>
            </div>
        </div>
      </div>
    </div>
  </div> 

    
@stop
