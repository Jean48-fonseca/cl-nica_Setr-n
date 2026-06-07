<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Treatment;
use App\Models\Diagnosis;

class TreatmentController extends Controller
{
    public function index(Request $request)
    {
        $tratamientos = Treatment::with('diagnosis')->get();

        if ($request->wantsJson()) {
            return response()->json(['data' => $tratamientos]);
        }

        return view('tratamientos.index', compact('tratamientos'));
    }

    public function create()
    {
        $diagnosticos = Diagnosis::all();
        return view('tratamientos.create', compact('diagnosticos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'diagnosis_id'       => 'required|exists:diagnoses,id',
            'general_indications' => 'required|string',
            'start_date'         => 'required|date',
            'end_date'           => 'nullable|date|after_or_equal:start_date',
        ]);

        $tratamiento = Treatment::create([
            'diagnosis_id'        => $request->diagnosis_id,
            'general indications' => $request->general_indications,
            'start_date'          => $request->start_date,
            'end_date'            => $request->end_date,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Tratamiento registrado', 'data' => $tratamiento], 201);
        }

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento registrado exitosamente.');
    }

    public function show(Request $request, $id)
    {
        $tratamiento = Treatment::with('diagnosis')->findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json(['data' => $tratamiento]);
        }

        return view('tratamientos.show', compact('tratamiento'));
    }

    public function edit($id)
    {
        $tratamiento  = Treatment::findOrFail($id);
        $diagnosticos = Diagnosis::all();
        return view('tratamientos.edit', compact('tratamiento', 'diagnosticos'));
    }

    public function update(Request $request, $id)
    {
        $tratamiento = Treatment::findOrFail($id);

        $request->validate([
            'diagnosis_id'        => 'required|exists:diagnoses,id',
            'general_indications' => 'required|string',
            'start_date'          => 'required|date',
            'end_date'            => 'nullable|date|after_or_equal:start_date',
        ]);

        $tratamiento->update([
            'diagnosis_id'        => $request->diagnosis_id,
            'general indications' => $request->general_indications,
            'start_date'          => $request->start_date,
            'end_date'            => $request->end_date,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Tratamiento actualizado', 'data' => $tratamiento]);
        }

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento actualizado exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $tratamiento = Treatment::findOrFail($id);
        $tratamiento->delete();

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Tratamiento eliminado exitosamente']);
        }

        return redirect()->route('tratamientos.index')->with('success', 'Tratamiento eliminado exitosamente.');
    }
}