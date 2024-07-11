<?php

namespace App\Http\Controllers;

use App\Models\AddKpi;
use App\Models\AdminDashboard;


class AdminController extends Controller
{
    public function index()
    {
        // Retrieve data from the Kpi model
        $kpis = AdminDashboard::orderBy('sortby', 'asc')->get();
        $addKpis = AddKpi::orderBy('bil')->get();
        
        // Calculate overall achievement percentage
        $totalTarget = $kpis->sum('target');
        $totalAchievement = $kpis->sum('achievement');
        $overallAchievement = $totalTarget ? ($totalAchievement / $totalTarget) * 100 : 0;

        return view('admin.dashboard.index', compact('kpis', 'addKpis', 'overallAchievement'));
    }

    public function addKpi()
    {
        return view('admin.add-kpi');
    }
}
