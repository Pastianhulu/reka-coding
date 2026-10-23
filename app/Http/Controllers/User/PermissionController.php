<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller 
{
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
            'name'  => 'required',
            'jenis' => 'required',
        ]);

        if (Permission::where('name', $request->name)->exists()) {
            toastr()->info('Data Permission Sudah Ada!', ['timeOut' => 5000]);
            return back()->withInput();
        }

        Permission::create([
            'name'       => $request->input('name'),
            'guard_name' => 'web',
            'jenis'      => $request->input('jenis'),
        ]);

        toastr()->success('Data Berhasil Disimpan!', ['timeOut' => 5000]);
        
        return redirect()->route('permission.index');
    }

    public function edit(Permission $permission)
    {
        return view('user.permissions.edit', compact('permission'));
    }
    
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'  => 'required',
            'jenis' => 'required',
        ]);

        $permission->update([
            'name'  => $request->input('name'),
            'jenis' => $request->input('jenis'),
        ]);

        toastr()->success('Data Telah di Ubah', ['timeOut' => 5000]);
        return redirect()->route('permission.index');
    }

    public function destroy(Permission $permission)
    {
        if ($permission->roles()->exists()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Permission masih dipakai role, lepaskan dulu dari role.',
            ], 422);
        }

        $permission->delete();

        return response()->json(['status' => 'success']);
    }
}