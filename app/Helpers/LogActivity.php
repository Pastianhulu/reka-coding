<?php

namespace App\Helpers;

use App\Models\LogActivity as LogActivityModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LogActivity
{
    public static function addToLog(string $subject): void
    {
        LogActivityModel::create([
            'user_id'    => Auth::id(),
            'subject'    => $subject,
            'url'        => Request::fullUrl(),
            'method'     => Request::method(),
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }

    public static function LogBaru(string $subject, $deskripsi): void
    {
        LogActivityModel::create([
            'user_id'    => Auth::id(),
            'subject'    => $subject,
            'deskripsi'  => json_encode($deskripsi),
            'url'        => Request::fullUrl(),
            'method'     => Request::method(),
            'ip_address' => Request::ip(),
            'user_agent' => Request::userAgent(),
        ]);
    }
}