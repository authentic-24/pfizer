<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\RegistrosController;
use App\Http\Controllers\EstadisticasController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/policies-data', function () {
    return view('policies-data.index');
})->name('policies-data.index');

Route::get('/policies-data/manejo-datos', function () {
    return view('policies-data.manejo-datos');
})->name('policies-data.manejo-datos');

Route::get('/diagnostic', [DiagnosticController::class, 'index'])->name('diagnostic.index');
Route::post('/diagnostic/start', [DiagnosticController::class, 'start'])->name('diagnostic.start');
Route::get('/diagnostic/quiz', [DiagnosticController::class, 'quiz'])->name('diagnostic.quiz');
Route::post('/diagnostic/submit', [DiagnosticController::class, 'submit'])->name('diagnostic.submit');
// Registros de diagnóstico (admin)
Route::get('/registros', [RegistrosController::class, 'index'])->name('registros.index');
Route::get('/registros/download-all', [RegistrosController::class, 'downloadAll'])->name('registros.download-all');
Route::get('/registros/{id}/download', [RegistrosController::class, 'download'])->name('registros.download');

// Estadísticas (protegido por contraseña)
Route::get('/estadisticas', [EstadisticasController::class, 'showLogin'])->name('estadisticas.login');
Route::post('/estadisticas', [EstadisticasController::class, 'login'])->name('estadisticas.login.post');
Route::get('/estadisticas/dashboard', [EstadisticasController::class, 'index'])->name('estadisticas.index');
Route::get('/estadisticas/logout', [EstadisticasController::class, 'logout'])->name('estadisticas.logout');
