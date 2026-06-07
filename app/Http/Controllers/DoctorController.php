<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor as Doctor;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $medicos = Doctor::all();

        if ($request->wantsJson()) {
            return response()->json(['data' => $medicos]);
        }

        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name'           => 'required|string|max:255',
                'surname'        => 'required|string|max:255',
                'specialization' => 'required|string|max:255',
                'cmp'            => 'required|string|unique:doctors,cmp',
                'phone_number'   => 'required|string|max:20',
                'email'          => 'required|email|unique:doctors,email',
            ]);

            $doctor = Doctor::create([
                'name'           => $request->name,
                'surname'        => $request->surname,
                'specialization' => $request->specialization,
                'cmp'            => $request->cmp,
                'phone_number'   => $request->phone_number,
                'email'          => $request->email,
            ]);

            if ($request->wantsJson()) {
                return response()->json(['mensaje' => 'Médico registrado', 'data' => $doctor], 201);
            }

            return redirect()->route('medicos.index')->with('success', 'Médico agregado exitosamente.');

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show(Request $request, $id)
    {
        $medico = Doctor::findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json(['data' => $medico]);
        }

        return view('medicos.show', compact('medico'));
    }

    public function edit($id)
    {
        $medico = Doctor::findOrFail($id);
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, $id)
    {
        $medico = Doctor::findOrFail($id);

        $request->validate([
            'name'           => 'required|string|max:255',
            'surname'        => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'cmp'            => 'required|string|unique:doctors,cmp,' . $id,
            'phone_number'   => 'required|string|max:20',
            'email'          => 'required|email|unique:doctors,email,' . $id,
        ]);

        $medico->update([
            'name'           => $request->name,
            'surname'        => $request->surname,
            'specialization' => $request->specialization,
            'cmp'            => $request->cmp,
            'phone_number'   => $request->phone_number,
            'email'          => $request->email,
        ]);

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Médico actualizado', 'data' => $medico]);
        }

        return redirect()->route('medicos.index')->with('success', 'Médico actualizado exitosamente.');
    }

    public function destroy(Request $request, $id)
    {
        $medico = Doctor::findOrFail($id);
        $medico->delete();

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Médico eliminado exitosamente']);
        }

        return redirect()->route('medicos.index')->with('success', 'Médico eliminado exitosamente.');
    }
}