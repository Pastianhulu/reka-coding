<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\CaraBayar;
use Illuminate\Validation\ValidationException;

class CaraBayarController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Master Cara Bayar']);
    }

    public function index()
    {
        $cara_bayars = CaraBayar::latest()->when(request()->cari, function($query) {
            $query->where('name', 'like', '%'. request()->cari . '%'); 
        })->paginate(10);

        return view('master.cara-bayar.index', compact('cara_bayars')); 
    }

    public function create()
    {
        return view('master.cara-bayar.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:50',
                'nomor_rekening' => 'required|max:50',
                'atas_nama' => 'required|max:100',
            ], [
                'name.required' => 'Nama Bank/Wallet tidak boleh kosong!',
                'nomor_rekening.required' => 'Nomor Rekening tidak boleh kosong!',
                'atas_nama.required' => 'Atas Nama tidak boleh kosong!',
            ]);

            if (CaraBayar::where('name', $request->name)->where('nomor_rekening', $request->nomor_rekening)->exists()) {
                toastr()->error('Data rekening ini sudah ada!', ['timeOut' => 5000]);
                return back()->withInput();
            }

            CaraBayar::create([
                'name' => $request->input('name'),
                'nomor_rekening' => $request->input('nomor_rekening'),
                'atas_nama' => $request->input('atas_nama'),
                'status' => $request->input('status'), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            toastr()->success('Data Berhasil Disimpan!', ['timeOut' => 5000]);
            return redirect()->route('cara-bayar.index');

        } catch (ValidationException $e) {
            toastr()->error($e->validator->errors()->first(), ['timeOut' => 5000]);
            return back()->withInput();

        } catch (\Exception $e) {
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);
            return back()->withInput();
        }
    }

    public function edit(CaraBayar $cara_bayar)
    {
        return view('master.cara-bayar.edit', compact('cara_bayar'));
    }

    public function update(Request $request, CaraBayar $cara_bayar)
    {
        try {
            $request->validate([
                'name' => 'required|max:50',
                'nomor_rekening' => 'required|max:50',
                'atas_nama' => 'required|max:100',
            ], [
                'name.required' => 'Nama Bank/Wallet tidak boleh kosong!',
                'nomor_rekening.required' => 'Nomor Rekening tidak boleh kosong!',
                'atas_nama.required' => 'Atas Nama tidak boleh kosong!',
            ]);

            if (CaraBayar::where('name', $request->name)->where('nomor_rekening', $request->nomor_rekening)->where('id', '!=', $cara_bayar->id)->exists()) {
                toastr()->error('Data rekening ini sudah ada!', ['timeOut' => 5000]);
                return back()->withInput();
            }

            $cara_bayar->update([
                'name' => $request->input('name'),
                'nomor_rekening' => $request->input('nomor_rekening'),
                'atas_nama' => $request->input('atas_nama'),
                'status' => $request->input('status'),
                'updated_at' => now(),
            ]);

            toastr()->success('Data Telah di Ubah!', ['timeOut' => 5000]);
            return redirect()->route('cara-bayar.index');

        } catch (ValidationException $e) {
            toastr()->error($e->validator->errors()->first(), ['timeOut' => 5000]);
            return back()->withInput();

        } catch (\Exception $e) {
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);
            return back()->withInput();
        }
    }

    public function destroy(CaraBayar $cara_bayar)
    {
        try {
            $cara_bayar->delete();
            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error']);
        }
    }
}