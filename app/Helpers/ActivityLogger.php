<?php

namespace App\Helpers;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    public static function log(
        string $module,
        string $action,
        string $title,
        ?string $description = null
    ): void {

        ActivityLog::create([

            'user_id' => Auth::id(),

            'module' => $module,

            'action' => strtoupper($action),

            'title' => $title,

            'description' => $description,

        ]);
    }
}