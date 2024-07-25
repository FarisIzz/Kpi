<?php

namespace App\Http\Controllers;

use App\Models\AddKpi;
// use App\Models\AdminDashboard;


class AdminController extends Controller
{
    public function __construct()
{
    $this->middleware('role:admin');
}
    public function index()
    {
        // Retrieve data from the Kpi model
        // $akpis = AdminDashboard::orderBy('sortby', 'asc')->get();
        $addKpis = AddKpi::orderBy('bil')->get();
        
        // Calculate overall achievement percentage
        $totalTarget = $addKpis->sum('target');
        $totalAchievement = $addKpis->sum('achievement');
        $overallAchievement = $totalTarget ? ($totalAchievement / $totalTarget) * 100 : 0;

        return view('admin.dashboard.index', compact('addKpis', 'overallAchievement'));
    }

    public function addKpi()
    {
        return view('admin.add-kpi');
    }
}
