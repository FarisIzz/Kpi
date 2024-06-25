<?php

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function addKpi()
    {
        return view('admin.add-kpi');
    }

    // public function dashboard()
    // {
    //     return view('admin.dashboard'); // Ensure this view file exists
    // }
}
