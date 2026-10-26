<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MembershipController extends Controller
{
    public function index()
    {
        $profil = DB::table('m_profil')->first();
        $caraBayars = DB::table('m_cara_bayar')->where('status', 1)->orderBy('name')->get();

        return view('member.upgrade', compact('profil', 'caraBayars'));
    }
}
