<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index()
    {
        return Patient::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'dob' => 'required|date',
            'document' => 'required|string|unique:patients',
        ]);

        return Patient::create($data);
    }

    public function show(Patient $patient)
    {
        return $patient;
    }

    public function update(Request $request, Patient $patient)
    {
        $data = $request->validate([
            'name' => 'sometimes|string',
            'dob' => 'sometimes|date',
            'document' => 'sometimes|string|unique:patients,document,' . $patient->id,
        ]);

        $patient->update($data);
        return $patient;
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->noContent();
    }
}
