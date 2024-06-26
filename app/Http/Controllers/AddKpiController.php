<?php

// app/Http/Controllers/AddKpiController.php

namespace App\Http\Controllers;

use App\Models\AddKpi;
use Illuminate\Http\Request;

class AddKpiController extends Controller
{
    public function index()
    {
        $addKpis = AddKpi::all();
        return view('admin.add-kpi', compact('addKpis'));
    }

    public function create()
    {
        return view('kpi.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'teras' => 'required|string|max:255',
            'so' => 'required|string|max:255',
            'negeri' => 'required|integer',
            'pemilik' => 'required|string|max:255',
            'kpi' => 'required|string|max:255',
            'pernyataan_kpi' => 'required|string|max:255',
            'sasaran' => 'required|string|max:255',
            'jenis_sasaran' => 'required|string|max:255',
            'pencapaian' => 'required|string|max:255',
            'peratus_pencapaian' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        AddKpi::create($request->all());

        return redirect()->route('admin.add-kpi')->with('success', 'KPI created successfully.');
    }

    public function edit(AddKpi $addKpi)
    {
        return view('kpi.edit', compact('addKpi')); // Ensure the view name is correct
    }

    public function update(Request $request, AddKpi $addKpi)
    {
        $request->validate([
            'teras' => 'required|string|max:255',
            'so' => 'required|string|max:255',
            'negeri' => 'required|integer',
            'pemilik' => 'required|string|max:255',
            'kpi' => 'required|string|max:255',
            'pernyataan_kpi' => 'required|string|max:255',
            'sasaran' => 'required|string|max:255',
            'jenis_sasaran' => 'required|string|max:255',
            'pencapaian' => 'required|string|max:255',
            'peratus_pencapaian' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $addKpi->update($request->all());

        return redirect()->route('admin.add-kpi')->with('success', 'KPI updated successfully.');
    }

    public function destroy(AddKpi $addKpi)
    {
        $addKpi->delete();

        return redirect()->route('admin.add-kpi')->with('success', 'KPI deleted successfully.');
    }
}
