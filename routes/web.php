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

    // Pacientes — IMPORTANTE: /create ANTES que /{id}
    Route::get('/pacientes', [PatientController::class, 'index'])->name('pacientes.index');
    Route::get('/pacientes/create', [PatientController::class, 'create'])->name('pacientes.create');
    Route::post('/pacientes', [PatientController::class, 'store'])->name('pacientes.store');
    Route::get('/pacientes/{id}', [PatientController::class, 'show'])->name('pacientes.show');
    Route::get('/pacientes/{id}/edit', [PatientController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/{id}', [PatientController::class, 'update'])->name('pacientes.update');
    Route::delete('/pacientes/{id}', [PatientController::class, 'destroy'])->name('pacientes.destroy');

    // Otros módulos
    Route::get('/medicos', [DoctorController::class, 'index'])->name('medicos.index');
    Route::get('/citas', [DateController::class, 'index'])->name('citas.index');
    Route::get('/diagnosticos', [DiagnosisController::class, 'index'])->name('diagnosticos.index');
    Route::get('/tratamientos', [TreatmentController::class, 'index'])->name('tratamientos.index');
    Route::get('/medicamentos', [MedicationController::class, 'index'])->name('medicamentos.index');
});