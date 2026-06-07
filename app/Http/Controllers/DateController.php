<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date as Cita;
use App\Models\Patient;
use App\Models\Doctor as Doctor;


class DateController extends Controller
{
    public function index(Request $request)
    {
        $citas = Cita::with(['patient', 'doctor'])->get();

        if ($request->wantsJson()) {
            return response()->json(['data' => $citas]);
        }

        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $pacientes = Patient::all();
        $medicos   = Doctor::all();
        return view('citas.create', compact('pacientes', 'medicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id'       => 'required|exists:patients,id',
            'doctor_id'        => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'motivo'           => 'required|string|max:255',
            'status'           => 'nullable|string|max:50',
        ]);

        $cita = Cita::create([
            'patient_id'       => $request->patient_id,
            'doctor_id'        => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'motivo'           => $request->motivo,
            'status'           => $request->status ?? 'scheduled',
        ]);

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Cita registrada', 'data' => $cita], 201);
        }

        return redirect()->route('citas.index')->with('success', 'Cita registrada exitosamente.');
    }

    public function show(Request $request, $id)
    {
        $cita = Cita::with(['patient', 'doctor'])->findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json(['data' => $cita]);
        }

        return view('citas.show', compact('cita'));
    }

    public function edit($id)
    {
        $cita      = Cita::findOrFail($id);
        $pacientes = Patient::all();
        $medicos   = Doctor::all();
        return view('citas.edit', compact('cita', 'pacientes', 'medicos'));
    }

    public function update(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);

        $request->validate([
            'patient_id'       => 'required|exists:patients,id',
            'doctor_id'        => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'motivo'           => 'required|string|max:255',
            'status'           => 'nullable|string|max:50',
        ]);

        $cita->update([
            'patient_id'       => $request->patient_id,
            'doctor_id'        => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'motivo'           => $request->motivo,
            'status'           => $request->status ?? 'scheduled',
        ]);

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Cita actualizada', 'data' => $cita]);
        }

        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $cita = Cita::findOrFail($id);
        $cita->delete();

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Cita eliminada exitosamente']);
        }

        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');
    }
}