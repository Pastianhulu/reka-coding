<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
  
    public function __construct()
    {
        $this->middleware(['permission:Master Role']);
    }

    public function index()
    {
        $roles = Role::latest()->when(request()->q, function($roles) {
            $roles = $roles->where('name', 'like', '%'. request()->q . '%');
        })->paginate(100);

        return view('user.role.index', compact('roles'));
    }

    
    public function create()
    {
        $permissions = Permission::latest()->get();
        // foreach($permissions->groupBy('jenis') as $jenis => $hak_akses) {
        //     $data['jenis'] = $jenis;
        //     $data['akses'] = $hak_akses->pluck('name')->all();
        //     $result[] = $data;
        // }
        // dd(json_encode($result));

        // return $hak_akses;
        


        return view('user.role.create', compact('permissions'));
    }

   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles'
        ]);

        $role = Role::create([
            'name' => $request->input('name')
        ]);

        //assign permission to role
        $role->syncPermissions($request->input('permissions'));

        if($role){
            return redirect()->route('role.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('role.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Role $role)
    {
        $permissions = Permission::latest()->get();
        return view('user.role.edit', compact('role', 'permissions'));
    }

    
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$role->id
        ]);
        
        $role = Role::findOrFail($role->id);
        $role->update([
            'name' => $request->input('name')
        ]);

        //assign permission to role
        $role->syncPermissions($request->input('permissions'));

        if($role){
            //redirect dengan pesan sukses
            return redirect()->route('role.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('role.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $permissions = $role->permissions;
        $role->revokePermissionTo($permissions);
        $role->delete();

        if($role){
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