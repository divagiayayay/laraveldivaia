<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
