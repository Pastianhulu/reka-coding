<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Profil;
use Illuminate\Validation\ValidationException;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Master Profil']);
    }

    public function index()
    {
        $profil = Profil::firstOrNew([]);

        return view('master.profil.index', compact('profil'));
    }


    public function edit()
    {
        $profil = Profil::firstOrNew([]);

        return view('master.profil.index', compact('profil'));
    }

    public function update(Request $request)
    {
        try {
            $data = $request->validate([
                'website'   => 'required|max:255',
                'developer' => 'required|max:255',
                'email'     => 'required|email',
                'whatsapp'  => 'required|max:20',
                'alamat'    => 'nullable',
                'harga_membership' => 'nullable|numeric|min:0',
                'instagram' => 'nullable|max:255',
                'youtube'   => 'nullable|max:255',
                'tiktok'    => 'nullable|max:255',
                'facebook'  => 'nullable|max:255',
            ], [
                'website.required'   => 'Nama Website wajib diisi!',
                'developer.required' => 'Nama Developer wajib diisi!',
                'email.required'     => 'Email wajib diisi!',
                'whatsapp.required'  => 'Nomor WhatsApp wajib diisi!',
            ]);

            Profil::firstOrNew([])->fill([
                'website'   => $request->website,
                'developer' => $request->developer,
                'email'     => $request->email,
                'whatsapp'  => $request->whatsapp,
                'alamat'    => $request->alamat,
                'harga_membership' => $request->harga_membership,
                'instagram' => $request->instagram,
                'youtube'   => $request->youtube,
                'tiktok'    => $request->tiktok,
                'facebook'  => $request->facebook,
            ])->save();

            toastr()->success('Profil Web Berhasil Diperbarui!', ['timeOut' => 5000]);
            return redirect()->back();

        } catch (ValidationException $e) {
            toastr()->info($e->validator->errors()->first(), ['timeOut' => 5000]);
            return back()->withInput();

        } catch (\Exception $e) {
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);
            return back()->withInput();
        }
    }
}