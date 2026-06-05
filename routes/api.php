<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\MedicationController;

Route::apiResource('pacientes', PatientController::class);
Route::apiResource('medicos', DoctorController::class);
Route::apiResource('citas', DateController::class);
Route::apiResource('diagnosticos', DiagnosisController::class);
Route::apiResource('tratamientos', TreatmentController::class);
Route::apiResource('medicamentos', MedicationController::class);
// Busca esta línea y solo añádele ->name('pacientes.create'); al final
// 1. PRIMERO las rutas estáticas (create, edit, etc.)
Route::get('/pacientes/create', [App\Http\Controllers\PatientController::class, 'create'])->name('pacientes.create');

// 2. DESPUÉS las rutas dinámicas (las que llevan llaves {})
Route::get('/pacientes/{id}', [App\Http\Controllers\PatientController::class, 'show'])->name('pacientes.show');

//sistema de seguiridad predeterminado de laravel, para proteger las rutas de la api, solo los usuarios autenticados podrán acceder a estas rutas
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

