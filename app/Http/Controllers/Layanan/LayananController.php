<?php

namespace App\Http\Controllers\Layanan;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;

class LayananController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:Master Layanan']);
    }

    public function index(Request $request)
    {
        $query = DB::table('tbl_layanan')->whereNull('id_hapus');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('cari')) {
            $query->where('judul', 'like', '%' . $request->cari . '%');
        }

        $layanans = $query->orderBy('urutan')->orderBy('id')->paginate(10)->withQueryString();

        return view('layanan.index', compact('layanans'));
    }

    public function create()
    {
        $urutanBerikut = (int) DB::table('tbl_layanan')->max('urutan') + 1;

        return view('layanan.create', compact('urutanBerikut'));
    }

    public function store(Request $request)
    {
        try {
            $pesan = [
                'required' => ': Tidak Boleh Kosong.!',
                'min'      => ': Minimal diisi :min karakter !',
                'max'      => ': Maksimal diisi :max karakter !',
            ];

            $validator = Validator::make($request->all(), [
                'judul'     => ['required'],
                'deskripsi' => ['required'],
                'fitur'     => ['required'],
                'urutan'    => ['required'],
                'status'    => ['required'],
            ], $pesan);

            if ($validator->fails()) {
                toastr()->title('Gagal')->error($validator->errors()->first(), ['timeOut' => 5000]);
                return back()->withInput();
            }

            DB::beginTransaction();

            DB::table('tbl_layanan')->insert([
                'judul'      => $request->judul,
                'deskripsi'  => $request->deskripsi,
                'fitur'      => $request->fitur,
                'urutan'     => $request->urutan,
                'status'     => $request->status,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            toastr()->success('Layanan berhasil ditambahkan!', ['timeOut' => 5000]);
            return redirect()->route('layanan.index');

        } catch (Throwable $e) {
            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }

            Log::error('Layanan store gagal: ' . $e->getMessage());
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);

            return back()->withInput();
        }
    }

    public function edit($id)
    {
        $layanan = DB::table('tbl_layanan')->where('id', $id)->whereNull('id_hapus')->first();

        if (!$layanan) {
            toastr()->error('Layanan tidak ditemukan!', ['timeOut' => 5000]);
            return redirect()->route('layanan.index');
        }

        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        try {
            $layanan = DB::table('tbl_layanan')->where('id', $id)->whereNull('id_hapus')->first();

            if (!$layanan) {
                toastr()->error('Layanan tidak ditemukan!', ['timeOut' => 5000]);
                return back();
            }

            $pesan = [
                'required' => ':Tidak Boleh Kosong.!',
                'min'      => ':Minimal diisi :min karakter !',
                'max'      => ':Maksimal diisi :max karakter !',
            ];

            $validator = Validator::make($request->all(), [
                'judul'     => ['required'],
                'deskripsi' => ['required'],
                'fitur'     => ['required'],
                'urutan'    => ['required'],
                'status'    => ['required'],
            ], $pesan);

            if ($validator->fails()) {
                foreach ($validator->errors()->all() as $gagal) {
                    toastr()->error($gagal, ['timeOut' => 5000]);
                }
                return back()->withInput();
            }

            DB::beginTransaction();

            DB::table('tbl_layanan')->where('id', $layanan->id)->update([
                'judul'      => $request->judul,
                'deskripsi'  => $request->deskripsi,
                'fitur'      => $request->fitur,
                'urutan'     => $request->urutan,
                'status'     => $request->status,
                'updated_at' => now(),
            ]);

            DB::commit();

            toastr()->success('Layanan berhasil diperbarui!', ['timeOut' => 5000]);
            return redirect()->route('layanan.index');

        } catch (Throwable $e) {
            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }

            Log::error('Layanan update gagal: ' . $e->getMessage());
            toastr()->error('Gagal! Terjadi kesalahan sistem.', ['timeOut' => 5000]);

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        $layanan = DB::table('tbl_layanan')->where('id', $id)->whereNull('id_hapus')->first();

        if (!$layanan) {
            return response()->json(['status' => 'error']);
        }

        DB::table('tbl_layanan')->where('id', $layanan->id)->update([
            'id_hapus'   => Auth::id(),
            'updated_at' => now(),
        ]);

        return response()->json(['status' => 'success']);
    }
}