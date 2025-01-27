<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Livestock;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stats()
    {
        $livestockCount = Livestock::count();
        $pendingApplications = Application::where('status', 'Pending')->count();
        $approvedApplications = Application::where('status', 'Approved')->count();

        return response()->json([
            'livestock' => $livestockCount,
            'pending' => $pendingApplications,
            'approved' => $approvedApplications,
        ]);
    }
}
