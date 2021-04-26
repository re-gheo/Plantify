<?php

namespace App\Services;

use App\Models\{AuditLog};

use Carbon\Carbon, Auth;

class LogServices{

    public static function log($activity, $table = NULL) {
        $log = AuditLog::create([
            'audit_userid' => Auth::id(),
            'table_changed' => $table,
            'activity' => $activity
        ]);
    }
}
