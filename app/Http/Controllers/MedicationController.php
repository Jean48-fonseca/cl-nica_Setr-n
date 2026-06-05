<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medications as medication; 

class MedicationController extends Controller
{
    public function store(Request $request)
    {
        try {
            $medication = \App\Models\Medications::create([
                'treatment_id' => $request->treatment_id,
                'name_medication' => $request->name_medication,
                'dosage' => $request->dosage,
                'frequency' => $request->frequency,
                'duration' => $request->duration
            ]);

            return response()->json(['mensaje' => 'Medicamento registrado', 'data' => $medication], 201);
            
        } catch (\Exception $e) {
            // Esto hará que Postman te diga EXACAMENTE qué línea o qué campo está fallando
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
