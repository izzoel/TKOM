<?php

use App\Models\Ujian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UjianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [BankController::class, 'index'])->name('landing');
Route::any('/login', [BankController::class, 'login'])->name('login');

Route::middleware(['auth.or.mahasiswa'])->group(function () {
    Route::get('/kalkulator', [BankController::class, 'kalkulator'])->name('kalkulator');
    Route::get('/bank', [BankController::class, 'bank'])->name('bank');
    Route::get('/soal/{nomor}', [BankController::class, 'soal'])->name('soal');
    Route::get('/logout', [BankController::class, 'logout'])->name('logout');
    Route::get('/jawab/{nomor}/{jawab}', [BankController::class, 'jawab'])->name('jawab');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/ujian', [AdminController::class, 'ujian'])->name('ujian');
    Route::get('/admin/sesi', [AdminController::class, 'sesi'])->name('sesi');

    Route::get('/admin/ujian/show/{id}', [UjianController::class, 'show']);
    Route::post('/admin/ujian/store', [UjianController::class, 'store'])->name('ujian_store');
    Route::put('/admin/ujian/update/{id}', [UjianController::class, 'update']);
    Route::delete('/admin/ujian/destroy/{id}', [UjianController::class, 'destroy']);
    Route::get('/admin/ujian/generate/{id}', [UjianController::class, 'generate'])->name('generate');
    Route::get('/admin/ujian/close/{id}', [UjianController::class, 'close'])->name('close');

    Route::get('/admin/sesi/show/{id}', [SesiController::class, 'show']);
    Route::post('/admin/sesi/store', [SesiController::class, 'store'])->name('sesi_store');
    Route::get('/admin/sesi/peserta/{id}', [SesiController::class, 'peserta']);
    Route::put('/admin/sesi/update/{id}', [SesiController::class, 'update']);
    Route::delete('/admin/sesi/destroy/{id}', [SesiController::class, 'destroy']);

    Route::post('/admin/peserta/import', [PesertaController::class, 'import'])->name('peserta_import');
});
