<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\MedicationController;

// Rutas públicas
Route::get('/', fn() => view('welcome'));

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::get('/auth/{provider}/redirect', [SocialController::class, 'redirectToProvider'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialController::class, 'handleProviderCallback'])->name('social.callback');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {

    Route::get('/home', fn() => view('home'))->name('home');

    // ── Pacientes ──────────────────────────────────────────
    Route::get('/pacientes',            [PatientController::class, 'index'])->name('pacientes.index');
    Route::get('/pacientes/create',     [PatientController::class, 'create'])->name('pacientes.create');
    Route::post('/pacientes',           [PatientController::class, 'store'])->name('pacientes.store');
    Route::get('/pacientes/{id}',       [PatientController::class, 'show'])->name('pacientes.show');
    Route::get('/pacientes/{id}/edit',  [PatientController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/{id}',       [PatientController::class, 'update'])->name('pacientes.update');
    Route::delete('/pacientes/{id}',    [PatientController::class, 'destroy'])->name('pacientes.destroy');

    // ── Médicos ────────────────────────────────────────────
    Route::get('/medicos',              [DoctorController::class, 'index'])->name('medicos.index');
    Route::get('/medicos/create',       [DoctorController::class, 'create'])->name('medicos.create');
    Route::post('/medicos',             [DoctorController::class, 'store'])->name('medicos.store');
    Route::get('/medicos/{id}',         [DoctorController::class, 'show'])->name('medicos.show');
    Route::get('/medicos/{id}/edit',    [DoctorController::class, 'edit'])->name('medicos.edit');
    Route::put('/medicos/{id}',         [DoctorController::class, 'update'])->name('medicos.update');
    Route::delete('/medicos/{id}',      [DoctorController::class, 'destroy'])->name('medicos.destroy');

    // ── Citas ──────────────────────────────────────────────
    Route::get('/citas',                [DateController::class, 'index'])->name('citas.index');
    Route::get('/citas/create',         [DateController::class, 'create'])->name('citas.create');
    Route::post('/citas',               [DateController::class, 'store'])->name('citas.store');
    Route::get('/citas/{id}',           [DateController::class, 'show'])->name('citas.show');
    Route::get('/citas/{id}/edit',      [DateController::class, 'edit'])->name('citas.edit');
    Route::put('/citas/{id}',           [DateController::class, 'update'])->name('citas.update');
    Route::delete('/citas/{id}',        [DateController::class, 'destroy'])->name('citas.destroy');

    // ── Diagnósticos ───────────────────────────────────────
    Route::get('/diagnosticos',             [DiagnosisController::class, 'index'])->name('diagnosticos.index');
    Route::get('/diagnosticos/create',      [DiagnosisController::class, 'create'])->name('diagnosticos.create');
    Route::post('/diagnosticos',            [DiagnosisController::class, 'store'])->name('diagnosticos.store');
    Route::get('/diagnosticos/{id}',        [DiagnosisController::class, 'show'])->name('diagnosticos.show');
    Route::get('/diagnosticos/{id}/edit',   [DiagnosisController::class, 'edit'])->name('diagnosticos.edit');
    Route::put('/diagnosticos/{id}',        [DiagnosisController::class, 'update'])->name('diagnosticos.update');
    Route::delete('/diagnosticos/{id}',     [DiagnosisController::class, 'destroy'])->name('diagnosticos.destroy');

    // ── Tratamientos ───────────────────────────────────────
    Route::get('/tratamientos',             [TreatmentController::class, 'index'])->name('tratamientos.index');
    Route::get('/tratamientos/create',      [TreatmentController::class, 'create'])->name('tratamientos.create');
    Route::post('/tratamientos',            [TreatmentController::class, 'store'])->name('tratamientos.store');
    Route::get('/tratamientos/{id}',        [TreatmentController::class, 'show'])->name('tratamientos.show');
    Route::get('/tratamientos/{id}/edit',   [TreatmentController::class, 'edit'])->name('tratamientos.edit');
    Route::put('/tratamientos/{id}',        [TreatmentController::class, 'update'])->name('tratamientos.update');
    Route::delete('/tratamientos/{id}',     [TreatmentController::class, 'destroy'])->name('tratamientos.destroy');

    // ── Medicamentos ───────────────────────────────────────
    Route::get('/medicamentos',             [MedicationController::class, 'index'])->name('medicamentos.index');
    Route::get('/medicamentos/create',      [MedicationController::class, 'create'])->name('medicamentos.create');
    Route::post('/medicamentos',            [MedicationController::class, 'store'])->name('medicamentos.store');
    Route::get('/medicamentos/{id}',        [MedicationController::class, 'show'])->name('medicamentos.show');
    Route::get('/medicamentos/{id}/edit',   [MedicationController::class, 'edit'])->name('medicamentos.edit');
    Route::put('/medicamentos/{id}',        [MedicationController::class, 'update'])->name('medicamentos.update');
    Route::delete('/medicamentos/{id}',     [MedicationController::class, 'destroy'])->name('medicamentos.destroy');

});