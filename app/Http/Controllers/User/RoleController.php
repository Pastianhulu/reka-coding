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

    public function index(Request $request)
    {
        $roles = Role::latest()->when($request->q, function ($query, $cari) {
            return $query->where('name', 'like', '%' . $cari . '%');
        })->paginate(100);

        return view('user.role.index', compact('roles'));
    }

    public function create()
    {

        $permissions = Permission::latest()->get();
        return view('user.role.create', compact('permissions'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create([
            'name' => $request->input('name'),
        ]);

        $role->syncPermissions($request->input('permissions', []));
        toastr()->success('Data Berhasil Disimpan!', ['timeOut' => 5000]);

        return redirect()->route('role.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::latest()->get();

        return view('user.role.edit', compact('role', 'permissions'));
    }



    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update([
            'name' => $request->input('name'),
        ]);

        $role->syncPermissions($request->input('permissions', []));

        toastr()->success('Data Berhasil Diupdate!', ['timeOut' => 5000]);

        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        $role->syncPermissions([]);
        $role->delete();

        return response()->json(['status' => 'success']);
    }
}