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
        return view('addKpi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'teras' => 'required|string|max:255',
            'SO' => 'required|string|max:255',
            'negeri' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kpi' => 'required|string|max:255',
            'pernyataan_kpi' => 'required|string|max:255',
            'sasaran' => 'required|string|max:255',
            'jenis_sasaran' => 'required|string|max:255',
            'pencapaian' => 'required|string|max:255',
            'peratus_pencapaian' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        AddKpi::create($request->all());

        return redirect()->route('addKpi.index');
    }

    public function edit(AddKpi $addKpi)
    {
        return view('addKpi.edit', compact('addKpi'));
    }

    public function update(Request $request, AddKpi $addKpi)
    {
        $request->validate([
            'teras' => 'required|string|max:255',
            'SO' => 'required|string|max:255',
            'negeri' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'kpi' => 'required|string|max:255',
            'pernyataan_kpi' => 'required|string|max:255',
            'sasaran' => 'required|string|max:255',
            'jenis_sasaran' => 'required|string|max:255',
            'pencapaian' => 'required|string|max:255',
            'peratus_pencapaian' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        $addKpi->update($request->all());

        return redirect()->route('addKpi.index');
    }

    public function destroy(AddKpi $addKpi)
    {
        $addKpi->delete();

        return redirect()->route('addKpi.index');
    }
}
