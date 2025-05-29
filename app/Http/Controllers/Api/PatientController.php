<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
 * @OA\Get(
 *     path="/api/patients",
 *     summary="List all patients",
 *     tags={"Patients"},
 *     security={{"sanctum":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="List of patients"
 *     ),
 *     @OA\Response(response=401, description="Unauthorized")
 * )
 */

    public function index()
    {
        return Patient::all();
    }

    /**
 * @OA\Post(
 *     path="/api/patients",
 *     summary="Create a new patient",
 *     tags={"Patients"},
 *     security={{"sanctum":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name","dob","document"},
 *             @OA\Property(property="name", type="string", example="João da Silva"),
 *             @OA\Property(property="dob", type="string", format="date", example="1980-10-15"),
 *             @OA\Property(property="document", type="string", example="12345678900")
 *         )
 *     ),
 *     @OA\Response(response=201, description="Patient created"),
 *     @OA\Response(response=401, description="Unauthorized")
 * )
 */


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'dob' => 'required|date',
            'document' => 'required|string|unique:patients',
        ]);

        return Patient::create($data);
    }


    /**
 * @OA\Get(
 *     path="/api/patients/{id}",
 *     summary="Get a specific patient",
 *     tags={"Patients"},
 *     security={{"sanctum":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(response=200, description="Patient details"),
 *     @OA\Response(response=404, description="Patient not found")
 * )
 */

    public function show(Patient $patient)
    {
        return $patient;
    }


    /**
 * @OA\Put(
 *     path="/api/patients/{id}",
 *     summary="Update a patient",
 *     tags={"Patients"},
 *     security={{"sanctum":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="dob", type="string", format="date"),
 *             @OA\Property(property="document", type="string")
 *         )
 *     ),
 *     @OA\Response(response=200, description="Patient updated"),
 *     @OA\Response(response=404, description="Patient not found")
 * )
 */

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


    /**
 * @OA\Delete(
 *     path="/api/patients/{id}",
 *     summary="Delete a patient",
 *     tags={"Patients"},
 *     security={{"sanctum":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(response=204, description="Patient deleted"),
 *     @OA\Response(response=404, description="Patient not found")
 * )
 */


    public function destroy(Patient $patient)
    {
        $patient->delete();
        return response()->noContent();
    }
}
