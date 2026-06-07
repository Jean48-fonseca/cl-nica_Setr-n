<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medication;
use App\Models\Treatment;

class MedicationController extends Controller
{
    public function index(Request $request)
    {
        $medicamentos = Medication::with('treatment')->get();

        if ($request->wantsJson()) {
            return response()->json(['data' => $medicamentos]);
        }

        return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        $tratamientos = Treatment::all();
        return view('medicamentos.create', compact('tratamientos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'treatment_id'    => 'required|exists:treatments,id',
            'name_medication' => 'required|string|max:255',
            'dosage'          => 'required|string|max:255',
            'frequency'       => 'required|string|max:255',
            'duration'        => 'required|integer|min:1',
        ]);

        $medicamento = Medication::create([
            'treatment_id'    => $request->treatment_id,
            'name_medication' => $request->name_medication,
            'dosage'          => $request->dosage,
            'frequency'       => $request->frequency,
            'duration'        => $request->duration,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Medicamento registrado', 'data' => $medicamento], 201);
        }

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento registrado exitosamente.');
    }

    public function show(Request $request, $id)
    {
        $medicamento = Medication::with('treatment')->findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json(['data' => $medicamento]);
        }

        return view('medicamentos.show', compact('medicamento'));
    }

    public function edit($id)
    {
        $medicamento  = Medication::findOrFail($id);
        $tratamientos = Treatment::all();
        return view('medicamentos.edit', compact('medicamento', 'tratamientos'));
    }

    public function update(Request $request, $id)
    {
        $medicamento = Medication::findOrFail($id);

        $request->validate([
            'treatment_id'    => 'required|exists:treatments,id',
            'name_medication' => 'required|string|max:255',
            'dosage'          => 'required|string|max:255',
            'frequency'       => 'required|string|max:255',
            'duration'        => 'required|integer|min:1',
        ]);

        $medicamento->update([
            'treatment_id'    => $request->treatment_id,
            'name_medication' => $request->name_medication,
            'dosage'          => $request->dosage,
            'frequency'       => $request->frequency,
            'duration'        => $request->duration,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Medicamento actualizado', 'data' => $medicamento]);
        }

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento actualizado exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $medicamento = Medication::findOrFail($id);
        $medicamento->delete();

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Medicamento eliminado exitosamente']);
        }

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento eliminado exitosamente.');
    }
}