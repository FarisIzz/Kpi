<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution;

class InstitutionController extends Controller
{
    public function index()
    {
        $institutions = Institution::all(); // Fetch all institutions from the database
        return view('admin.KeselamatanInteligen', ['institutions' => $institutions]);
    }
}