<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller {

    
    public function __construct()
    {
        $this->middleware(['permission:Master Permission']);
    } 
    
    public function index()
    {
        $permissions = Permission::latest()->when(request()->cari, function($permissions) {
            $permissions = $permissions->where('name', 'like', '%'. request()->cari . '%');
        })->paginate(5);

        return view('user.permissions.index', compact('permissions'));
    }

    
    public function create()
    {
        return view('user.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'jenis'       => 'required',
        ]);

        if (Permission::where('name', $request->name)->exists()) {
            toastr()->info('Data Persmission Sudah Ada !');
            return back();
        }

        try {
            $permission = Permission::create([
                'name'       => $request->input('name'),
                'guard_name' => 'web',
                'jenis'      => $request->input('jenis'),
            ]);

            if ($permission) {
                toastr()->success('Data Berhasil Disimpan !');
            } else {
                toastr()->error('Data Gagal Disimpan !');
            }
        } catch (\Exception $e) {
            toastr()->error('Gagal! Terjadi kesalahan sistem.');
        }
        return redirect()->route('permission.index');
    }


    public function edit(Permission $permission)
    {
        return view('user.permissions.edit', compact('permission'));
    }
    
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'      => 'required',
            'jenis'     => 'required'
        ]);
        
        $permission = Permission::findOrFail($permission->id);
        
        $permission->update([
            'name'      => $request->input('name'),
            'jenis'     => $request->input('jenis')
        ]);

        if($permission){
            toastr()->success('Data Telah di Ubah'); 
        }else{
            toastr()->error('Data Gagal Diubah !'); 
        }
        return redirect()->route('permission.index');
    }


    public function destroy($id)
    {
        $hapus = Permission::findOrFail($id);
        $hapus->delete();
        if($hapus){
            return response()->json([
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                'status' => 'error'
            ]);
        }
    }


}