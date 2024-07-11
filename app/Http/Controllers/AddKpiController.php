<?php

namespace App\Http\Controllers;

use App\Models\AddKpi;
use Illuminate\Http\Request;

class AddKpiController extends Controller
{
    public function index()
    {
        $addKpis = AddKpi::orderBy('bil')->get();
        return view('admin.kpi.IndexKPI', compact('addKpis'));
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
            'pernyataan_kpi' => 'required|string|max:255',
            'sasaran' => 'required|string|max:255',
            'jenis_sasaran' => 'required|string|max:255',
        ]);

        $bil = AddKpi::count() + 1;

        $data = $request->all();
        $data['bil'] = $bil;
        $data['kpi'] = 'KPI ' . $bil;

        AddKpi::create($data);

        return redirect()->route('admin.kpi')->with('success', 'KPI created successfully.');
    }

      public function edit($id)
    {
        $addKpi = AddKpi::findOrFail($id);
        return view('kpi.edit', compact('addKpi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'teras' => 'required|string|max:255',
            'so' => 'required|string|max:255',
            'pernyataan_kpi' => 'required|string|max:255',
            'sasaran' => 'required|string|max:255',
            'jenis_sasaran' => 'required|string|max:255',
        ]);

        $addKpi = AddKpi::findOrFail($id);
        $addKpi->update($request->all());

        return redirect()->route('admin.kpi')->with('success', 'KPI updated successfully.');
    }

    public function destroy(AddKpi $addKpi)
    {
        $addKpi->delete();
        $this->recalculateBilAndKpi(); 

        return redirect()->route('admin.kpi')->with('success', 'KPI deleted successfully.');
    }

    private function recalculateBilAndKpi()
    {
        $addKpis = AddKpi::orderBy('id')->get();
        foreach ($addKpis as $index => $addKpi) {
            $bil = $index + 1;
            $addKpi->bil = $bil;
            $addKpi->kpi = 'KPI ' . $bil;
            $addKpi->save();
        }
    }
}
