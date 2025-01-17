<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VagaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Vagas
Route::resource('vagas', VagaController::class);
Route::get('/vagas', [VagaController::class, 'index'])->name('vagas.index');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('vagas/create', [VagaController::class, 'create'])->name('vagas.create');
    Route::post('vagas', [VagaController::class, 'store'])->name('vagas.store');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
