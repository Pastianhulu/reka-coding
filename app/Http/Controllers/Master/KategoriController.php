<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Kategori;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Master Kategori']);
    }

    public function index()
    {
        $kategoris = Kategori::latest()->when(request()->cari, function($query) {
            $query->where('name', 'like', '%'. request()->cari . '%'); 
        })->paginate(10);

        return view('master.kategori.index', compact('kategoris')); 
    }

    public function create()
    {
        return view('master.kategori.create');
    }

    public function store(Request $request){
          
    try {
        $request->validate([
            'name' => 'required|max:50' 
        ], [
            'name.required' => 'Data Tidak Boleh Kosong!',
            'name.max'      => 'Nama maksimal 50 karakter!'
        ]);

        if (Kategori::where('name', $request->name)->exists()) {
            toastr()->info('Kategori ini sudah ada!', ['timeOut' => 5000]);
            return back()->withInput();
        }
        
        Kategori::create([
            'name' => $request->input('name'),
            'created_at' => now(), 
            'updated_at' => now(),
        ]);

        toastr()->success('Data Berhasil Disimpan!', ['timeOut' => 5000]);
        return redirect()->route('kategori.index');

        } catch (\Exception $e) {
            toastr()->error('Gagal! Terjadi kesalahan sistem silahkan hubungi admin.', ['timeOut' => 5000]);
            return back()->withInput();
        }
    }

    public function edit(Kategori $kategori)
    {
        return view('master.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        
        try {
            
            $request->validate([
                'name' => 'required|max:50' 
            ], [
                'name.required' => 'Data Tidak Boleh Kosong!',
                'name.max'      => 'Nama maksimal 50 karakter!'
            ]);

            if (Kategori::where('name', $request->name)->exists()) {
                toastr()->info('Kategori ini sudah ada!', ['timeOut' => 5000]);
                return back()->withInput();
            }
            
            $kategori->update([
                'name' => $request->input('name'),
                'updated_at' => now(),
            ]);

            toastr()->info('Data Berhasil di Ubah!', ['timeOut' => 5000]);
            return redirect()->route('kategori.index');

        } catch (\Exception $e) {
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);
            return back()->withInput();
        }
    }

    public function destroy(Kategori $kategori)
    {
        try {
            $kategori->delete();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error']);
        }
    }
}