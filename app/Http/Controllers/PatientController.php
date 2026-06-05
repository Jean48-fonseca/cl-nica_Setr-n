<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    // Muestra la tabla de pacientes
    public function index(Request $request)
    {
        $pacientes = Patient::all();

        if ($request->wantsJson()) {
            return response()->json(['data' => $pacientes]);
        }

        return view('pacientes.index', compact('pacientes'));
    }

    // Muestra el formulario para agregar un paciente
    public function create()
    {
        return view('pacientes.create');
    }

    // Guarda el nuevo paciente
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'surname'       => 'required|string|max:255',
            'dni'           => 'required|string|size:8|unique:patients,dni',
            'telephone'     => 'required|string|max:20',
            'email'         => 'required|email|max:255',
            'date_of_birth' => 'required',
            'address'       => 'required|string|max:255',
            'gender'        => 'nullable|string',
            'blood_type'    => 'nullable|string',
        ]);

        $paciente = Patient::create([
            'name'          => $request->name,
            'surname'       => $request->surname,
            'dni'           => $request->dni,
            'telephone'     => $request->telephone,
            'email'         => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'address'       => $request->address,
            'gender'        => $request->gender,
            'blood_type'    => $request->blood_type,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'mensaje' => 'Paciente registrado exitosamente',
                'data'    => $paciente
            ], 201);
        }

        return redirect()->route('pacientes.index')
                         ->with('success', 'Paciente agregado exitosamente.');
    }

    // Muestra un paciente específico
    public function show(Request $request, $id)
    {
        $paciente = Patient::findOrFail($id);

        if ($request->wantsJson()) {
            return response()->json(['data' => $paciente]);
        }

        return view('pacientes.show', compact('paciente'));
    }

    // Muestra el formulario para editar un paciente
    public function edit($id)
    {
        $paciente = Patient::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
    }

    // Actualiza los datos del paciente
    public function update(Request $request, $id)
    {
        $paciente = Patient::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'surname'       => 'required|string|max:255',
            'dni'           => 'required|string|size:8|unique:patients,dni,' . $id,
            'telephone'     => 'required|string|max:20',
            'email'         => 'required|email|max:255',
            'date_of_birth' => 'required',
            'address'       => 'required|string|max:255',
            'gender'        => 'nullable|string',
            'blood_type'    => 'nullable|string',
        ]);

        $paciente->update([
            'name'          => $request->name,
            'surname'       => $request->surname,
            'dni'           => $request->dni,
            'telephone'     => $request->telephone,
            'email'         => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'address'       => $request->address,
            'gender'        => $request->gender,
            'blood_type'    => $request->blood_type,
        ]);

        if ($request->wantsJson()) {
            return response()->json([
                'mensaje' => 'Paciente actualizado exitosamente',
                'data'    => $paciente
            ]);
        }

        return redirect()->route('pacientes.index')
                         ->with('success', 'Paciente actualizado exitosamente.');
    }

    // Elimina un paciente
    public function destroy(Request $request, $id)
    {
        $paciente = Patient::findOrFail($id);
        $paciente->delete();

        if ($request->wantsJson()) {
            return response()->json(['mensaje' => 'Paciente eliminado exitosamente']);
        }

        return redirect()->route('pacientes.index')
                         ->with('success', 'Paciente eliminado exitosamente.');
    }
}