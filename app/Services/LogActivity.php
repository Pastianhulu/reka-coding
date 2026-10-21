<?php

namespace App\Services;

use App\Models\LogActivity as LogActivityModel;
use Illuminate\Support\Facades\Auth;

class LogActivity
{
    public function addToLog(string $activity): LogActivityModel
    {
        return LogActivityModel::create([
            'user_id' => Auth::id(),
            'activity' => $activity,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
