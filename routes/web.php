<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\JawabController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PesertaController;

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


Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::get('/selesai', [LandingController::class, 'selesai'])->name('selesai');
Route::any('/login', [LandingController::class, 'login'])->name('login');
Route::any('/peserta', [LandingController::class, 'peserta'])->name('peserta');

Route::middleware(['auth.or.mahasiswa'])->group(function () {

    Route::get('/soal/{nomor}', [SoalController::class, 'index'])->name('soal');
    // Route::get('/soal/1', [SoalController::class, 'index']);
    Route::get('/durasi', [SoalController::class, 'durasi']);
    Route::get('/jawab/{nomor}/{jawab}', [SoalController::class, 'jawab'])->name('jawab');

    Route::get('/kalkulator', [BankController::class, 'kalkulator'])->name('kalkulator');
    // Route::get('/soal/{nomor}', [BankController::class, 'soal'])->name('soal');
    Route::get('/logout', [LandingController::class, 'logout'])->name('logout');
    Route::get('/submit', [LandingController::class, 'submit'])->name('submit');
    // Route::get('/jawab/{nomor}/{jawab}', [BankController::class, 'jawab'])->name('jawab');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/ujian', [AdminController::class, 'ujian'])->name('ujian');
    Route::get('/admin/sesi', [AdminController::class, 'sesi'])->name('sesi');
    Route::get('/admin/bank', [AdminController::class, 'bank'])->name('bank');
    // Route::get('/admin/bank', [BankController::class, 'bank'])->name('bank');

    Route::post('/admin/bank/import', [BankController::class, 'import'])->name('bank_import');

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
    Route::get('/admin/jawab/show/{id}', [JawabController::class, 'show'])->name('hasil');
});
