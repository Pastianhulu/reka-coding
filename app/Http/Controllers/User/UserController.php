<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Master User']);
    }

    public function index()
    {
        $users = User::latest()->where('id', '<>', 1)->when(request()->cari, function($users) {
            $users = $users->where('name', 'like', '%'. request()->cari . '%')->where('id', '<>', 0);
        })->paginate(30);

        return view('user.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::latest()->where('name', '<>', 'admin')->get();
        return view('user.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Hapus unique:users dari sini
        $request->validate([
            'name'     => 'required',
            'email'    => 'required',
            'password' => 'required|confirmed'
        ]);

        // Cek manual — tampil via toastr
        if (User::where('email', $request->email)->exists()) {
            toastr()->error('Username / Email sudah digunakan!', ['timeOut' => 5000]);
            return back()->withInput();
        }

        try {
            $user = User::create([
                'name'     => $request->input('name'),
                'email'    => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);

            $user->assignRole($request->input('role'));

            \LogActivity::addToLog('Tambah User ' . $user->name . ' - ' . $user->email);
            toastr()->success('Data User Berhasil Disimpan!', ['timeOut' => 5000]);
            return redirect()->route('user.index');

        } catch (\Exception $gagal) {
            toastr()->error($gagal->getMessage(), 'Gagal', ['timeOut' => 5000]);
            return back()->withInput();
        }
    }


    public function edit(User $user)
    {
        if ($user->id == '1') {
            return back();
        } else {
            $roles = Role::latest()->where('name', '<>', 'admin')->get();
            return view('user.user.edit', compact('user', 'roles'));
        }
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|unique:users,email,' . $user->id
        ]);

        try {
            $user = User::findOrFail($user->id);

            if ($request->input('password') == "") {
                $user->update([
                    'name'  => $request->input('name'),
                    'email' => $request->input('email'),
                ]);
            } else {
                $user->update([
                    'name'     => $request->input('name'),
                    'email'    => $request->input('email'),
                    'password' => bcrypt($request->input('password'))
                ]);
            }

            $user->syncRoles($request->input('role'));

            if ($user) {
                \LogActivity::addToLog('Ubah Data User ' . $user->name . ' - ' . $user->email);
                toastr()->success('Data User Berhasil Diupdate!', ['timeOut' => 5000]);
                return redirect()->route('user.index');
            } else {
                toastr()->error('Data User Gagal Diupdate!', ['timeOut' => 5000]);
                return back()->withInput();
            }

        } catch (\Exception $gagal) {
            toastr()->error($gagal->getMessage(), 'Gagal', ['timeOut' => 5000]);
            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $namaUser  = $user->name;
            $emailUser = $user->email;

            $user->delete();

            \LogActivity::addToLog('Hapus Data User ' . $namaUser . ' - ' . $emailUser);

            return response()->json(['status' => 'success']);

        } catch (\Exception $gagal) {
            return response()->json([
                'status'  => 'error',
                'message' => $gagal->getMessage()
            ], 500);
        }
    }
}