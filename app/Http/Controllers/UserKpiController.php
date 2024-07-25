<?php

namespace App\Http\Controllers;

use App\Models\AddKpi;
use Illuminate\Http\Request;

class UserKpiController extends Controller
{
    public function inputForm()
    {
        $addKpis = AddKpi::all();
        return view('user.KPI.IndexKPI', compact('addKpis'));
    }

    public function storeInput(Request $request)
{
    // Validate the request data
    $request->validate([
        'kpi_id' => 'required|exists:add_kpis,id',
        'pencapaian' => 'required|numeric',
        'peratus_pencapaian' => 'required|numeric'
    ]);

    // Find the KPI entry
    $kpi = AddKpi::find($request->kpi_id);

    // Update the KPI data
    $kpi->pencapaian = $request->pencapaian;
    $kpi->peratus_pencapaian = $request->peratus_pencapaian;
    $kpi->save();

    // Redirect or return response
    return redirect()->back()->with('success', 'KPI updated successfully!');
}


    public function edit($id)
    {
        $addKpi = AddKpi::findOrFail($id);
        return view('user.edit', compact('addKpi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pencapaian' => 'required|string',
        ]);

        $addKpi = AddKpi::findOrFail($id);
        $addKpi->pencapaian = $request->input('pencapaian');
        $addKpi->peratus_pencapaian = $request->input('peratus_pencapaian');
        $addKpi->save();

        return redirect()->back()->with('success', 'KPI updated successfully');
    }

    private function validateKpi(Request $request)
    {
        $request->validate([
            'kpi_id' => 'required|exists:add_kpis,id',
            'pencapaian' => 'required|numeric',
        ]);
    }
}
