<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Models\Date as Cita;

class DiagnosisController extends Controller
{
    public function index(Request $request)
    {
        $diagnosticos = Diagnosis::with('date')->get();

        if ($request->wantsJson()) {
            return response()->json(['data' => $diagnosticos]);
        }

        return view('diagnosticos.index', compact('diagnosticos'));
    }

    public function create()
    {
        $citas = Cita::with(['patient', 'doctor'])->get();
        return view('diagnosticos.create', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_id'              => 'required|exists:dates,id',
            'disease'              => 'required|string|max:255',
            'description_clinical' => 'required|string',
        ]);

        $diagnostico = Diagnosis::create([
            'date_id'              => $request->date_id,
            'disease'              => $request->disease,
            'description_clinical' => $request->description_clinical,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Diagnóstico registrado', 'data' => $diagnostico], 201);
        }

        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico registrado exitosamente.');
    }

    public function show(Request $request, $id)
    {
        $diagnostico = Diagnosis::with('date')->findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json(['data' => $diagnostico]);
        }

        return view('diagnosticos.show', compact('diagnostico'));
    }

    public function edit($id)
    {
        $diagnostico = Diagnosis::findOrFail($id);
        $citas       = Cita::with(['patient', 'doctor'])->get();
        return view('diagnosticos.edit', compact('diagnostico', 'citas'));
    }

    public function update(Request $request, $id)
    {
        $diagnostico = Diagnosis::findOrFail($id);

        $request->validate([
            'date_id'              => 'required|exists:dates,id',
            'disease'              => 'required|string|max:255',
            'description_clinical' => 'required|string',
        ]);

        $diagnostico->update([
            'date_id'              => $request->date_id,
            'disease'              => $request->disease,
            'description_clinical' => $request->description_clinical,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Diagnóstico actualizado', 'data' => $diagnostico]);
        }

        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico actualizado exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $diagnostico = Diagnosis::findOrFail($id);
        $diagnostico->delete();

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Diagnóstico eliminado exitosamente']);
        }

        return redirect()->route('diagnosticos.index')->with('success', 'Diagnóstico eliminado exitosamente.');
    }
}