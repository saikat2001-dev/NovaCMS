<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showDashboard()
    {
        $stats = [
            'users' => DB::table('users')->count(),
            'blogs' => DB::table('blogs')->count(),
            'brands' => DB::table('brands')->count(),
            'roles' => DB::table('roles')->count(),
        ];

        // Storage calculation
        $totalSpace = @disk_total_space('/') ?: 1;
        $freeSpace = @disk_free_space('/') ?: 0;
        $usedSpace = $totalSpace - $freeSpace;
        $storagePercentage = round(($usedSpace / $totalSpace) * 100);

        // Database calculation
        $dbName = DB::getDatabaseName();
        $dbSizeQuery = DB::select("SELECT SUM(data_length + index_length) / 1024 / 1024 as size FROM information_schema.TABLES WHERE table_schema = ?", [$dbName]);
        $dbSizeInMb = $dbSizeQuery[0]->size ?? 0;
        
        // Use a soft quota of 256MB for visualization percentage
        $dbPercentage = round(($dbSizeInMb / 256) * 100);
        $dbPercentage = min($dbPercentage, 100);

        $health = [
            'storage' => $storagePercentage,
            'database' => $dbPercentage,
            'dbSize' => round($dbSizeInMb, 2)
        ];

        $recentUsers = DB::table('users')->orderBy('created_at', 'desc')->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentUsers', 'health'));
    }
}
