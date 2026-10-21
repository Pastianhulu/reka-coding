<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
class AksiUserController extends Controller
{



    public function index()
    {
        return view('user.password.ganti_password');
    }

    public function update(Request $request)
    {
            $user =  Auth::user()->id;
            $password = $request->input('passwordlama');
            $cek_login = User::where('id',$user)->first();
            $this->validate($request, [
                'passwordlama'      => 'required',
                'password' => 'min:5|required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'min:5'
            ]);

            if ( ! Hash::check($password, $cek_login->password)){
                toastr()->error('Password Lama Tidak Valid', 'Gagal', ['timeOut' => 5000]);
                return back()->withInput();
            }else{
                $user = User::findOrFail($cek_login->id);
                $user->update([
                    'password'  => bcrypt($request->input('password'))
                ]);
            }

            if($user){

                \LogActivity::addToLog('Ganti Password');


                return redirect('/logout');
            }else{ toastr()->error('Ganti Password Tidak Berhasil', 'Gagal', ['timeOut' => 5000]);
                return back()->withInput();
            }
    }

    public function thema()
    {
        $id_user =  Auth::user()->id;
        $user = User::where('id',$id_user)->first();
        return view('user.profil.index', compact('user'));
    }


    public function update_thema(Request $request)
    {
            $user =  Auth::user()->id;
            $cek_login = User::where('id',$user)->first();
            $this->validate($request, [
                'navbar'      => 'required',
                'sidebar'      => 'required'
            ]);

            if ($request->navbar ==''){
                toastr()->error('Data Tidak Valid', 'Gagal', ['timeOut' => 5000]);
                return back()->withInput();
            }else{
                $user = User::findOrFail($cek_login->id);
                $user->update([
                    'sidebar'  => $request->input('sidebar'),
                    'navbar'  => $request->input('navbar'),
                    'navigasi'  => $request->input('navigasi'),
                    'size_font'  => $request->input('size_font'),
                    'spa'  => $request->input('spa'),
                    'dark'  => $request->input('dark'),
                    'loading'  => $request->input('loading')
                ]);
            }

            if($user){
                toastr()->success('Thema Anda  Barhasil di Update - Mantap', 'Berhasil', ['timeOut' => 5000]);
                return back()->withInput();
            }else{ toastr()->error('Gagal  Update', 'Gagal', ['timeOut' => 5000]);
                return back()->withInput();
            }
    }

}
