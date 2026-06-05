<?php

namespace App\Http\Controllers;
use App\Models\Dates;

use Illuminate\Http\Request;

class DateController extends Controller
{public function index()
{
    // Asumiendo que tu modelo se llama "Dates" (según tus archivos anteriores)
    $citas = \App\Models\Dates::all(); 
    
    return response()->json([
        'mensaje' => 'Lista de citas obtenida',
        'data' => $citas
    ], 200);
}
    public function store(Request $request)
    {
    try {
        $validatedData = $request->validate([
            'patient_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'appointment_date' => 'required|date',
            'motivo' => 'required|string',
            'status' => 'required|string'
        ]);

        $date = Dates::create($validatedData);

        return response()->json(['mensaje' => 'Cita registrada', 'data' => $date], 201);
        
    } catch (\Exception $e) {
        // Esto hará que Postman te diga EXACAMENTE qué línea o qué campo está fallando
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
public function show($id)   /* devolver cita */ 
{ 
        $cita = \App\Models\Dates::findOrFail($id);
        return response()->json(['data' => $cita], 200);
    }

    public function update(Request $request, $id) /* lógica de edición */
     {
        $cita = \App\Models\Dates::findOrFail($id);
        $cita->update($request->all());
        return response()->json(['mensaje' => 'Cita actualizada', 'data' => $cita], 200);
    }

    public function destroy($id) /* lógica de borrado */ 
    {
        \App\Models\Dates::destroy($id);
        return response()->json(['mensaje' => 'Cita eliminada correctamente'], 200);
    }
}