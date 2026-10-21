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
        $roles = Role::latest()->where('name', '<>','admin')->get();
        return view('user.user.create', compact('roles'));
    }
   
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|confirmed'
        ]);

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => bcrypt($request->input('password'))
        ]);

        // \LogActivity::addToLog($user->name);
        //assign role
        $user->assignRole($request->input('role'));

        if($user){
            //redirect dengan pesan sukses
            // Tambah Histori Kegiatan
            \LogActivity::addToLog('Tambah User' . $user->name .' - '. $user->email);
            return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('user.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(User $user)
    {

        if($user->id=='1'){
            return back();

        }else{
                $roles = Role::latest()->where('name', '<>','admin')->get();
                return view('user.user.edit', compact('user', 'roles'));
        }
    }


    public function update(Request $request, User $user)
    {
        try{

            $this->validate($request, [
                'name'      => 'required',
                'email'     => 'required|unique:users,email,'.$user->id
            ]);
    
            $user = User::findOrFail($user->id);
           
            if($request->input('password') == "") {
                $user->update([
                    'name'      => $request->input('name'),
                    'email'     => $request->input('email'),
                ]);
            } else {
                $user->update([
                    'name'      => $request->input('name'),
                    'email'     => $request->input('email'),
                    'password'  => bcrypt($request->input('password'))
                ]);
            }
    
    
            //assign role
            $user->syncRoles($request->input('role'));
            if($user){
                // Tambah Histori Kegiatan
                \LogActivity::addToLog('Ubah Data User' . $user->name .' - '. $user->email);
                //redirect dengan pesan sukses
                return redirect()->route('user.index')->with(['success' => 'Data Berhasil Diupdate!']);
            }else{
                //redirect dengan pesan error
                return redirect()->route('user.index')->with(['error' => 'Data Gagal Diupdate!']);
            }
        }catch(\Exception $gagal) {
            toastr()->error(' ' . $gagal->getMessage() . ' ', '   Gagal ', ['timeOut' => 5000]);
            return back()->withInput();
        }

        
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        \LogActivity::addToLog('Hapus Data User' . $user->name .' - '. $user->email);
        //redirect dengan pesan sukses
        if($user){
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
