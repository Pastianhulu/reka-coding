<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
   
    use AuthenticatesUsers;

    protected $maxAttempts = 3; // Jikas salah password 3 kali
    protected $decayMinutes = 3; // Waktu 60 detik jika salah Password

    protected function redirectTo()
    {
        if (auth()->user()->role === 'admin') {
            return '/admin/dashboard';
        }
        
        return '/member/dashboard';
    }

    public function __construct()

    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
