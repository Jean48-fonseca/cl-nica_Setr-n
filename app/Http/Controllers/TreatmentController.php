<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatments as Treatment;

class TreatmentController extends Controller
{
    public function store(Request $request)
    {
        try {
            $treatment = \App\Models\Treatments::create([
               'diagnosis_id'=> $request->diagnosis_id,
         'general_indications'=> $request->general_indications,
              'start_date'   => $request->start_date,
               'end_date'    => $request->end_date,
            ]);

            return response()->json(['mensaje' => 'Tratamiento registrado', 'data' => $treatment], 201);
            
        } catch (\Exception $e) {
            // Esto hará que Postman te diga EXACAMENTE qué línea o qué campo está fallando
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
