<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DiagnosticController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/policies-data', function () {
    return view('policies-data.index');
})->name('policies-data.index');

Route::get('/diagnostic', [DiagnosticController::class, 'index'])->name('diagnostic.index');
Route::post('/diagnostic/start', [DiagnosticController::class, 'start'])->name('diagnostic.start');
Route::get('/diagnostic/quiz', [DiagnosticController::class, 'quiz'])->name('diagnostic.quiz');
Route::post('/diagnostic/submit', [DiagnosticController::class, 'submit'])->name('diagnostic.submit');
