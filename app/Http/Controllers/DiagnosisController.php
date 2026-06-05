<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnoses;

class DiagnosisController extends Controller
{
    public function store(Request $request)
    {
        try {
            $diagnosis = Diagnoses::create([
                'date_id' => $request->input('date_id'),
                'disease' => $request->input('disease'),
                'description_clinical' => $request->input('description_clinical')
            ]);

            return response()->json(['mensaje' => 'Diagnóstico registrado', 'data' => $diagnosis], 201);
            
        } catch (\Exception $e) {
            // Esto hará que Postman te diga EXACAMENTE qué línea o qué campo está fallando
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
