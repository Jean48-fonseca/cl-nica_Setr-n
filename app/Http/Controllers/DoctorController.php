<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors as Doctor;

class DoctorController extends Controller
{
public function store(Request $request)
{
    try {
        $doctor = Doctor::create([
            'name'           => $request->name,
            'surname'        => $request->surname,
            'specialization' => $request->specialization,
            'cmp'            => $request->cmp,
            'phone_number'   => $request->phone_number,
            'email'          => $request->email,
        ]);

        return response()->json(['mensaje' => 'Médico registrado', 'data' => $doctor], 201);
        
    } catch (\Exception $e) {
        // Esto hará que Postman te diga EXACAMENTE qué línea o qué campo está fallando
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
public function index(Request $request)
{
    $medicos = Doctor::all();
    if ($request->wantsJson()) {
        return response()->json(['data' => $medicos]);
    }
    return view('medicos.index', compact('medicos'));
}
}
