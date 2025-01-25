<?php

use App\Http\Controllers\BankController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [BankController::class, 'index'])->name('main');
Route::get('/login', [BankController::class, 'login'])->name('login');
Route::post('/login', [BankController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/bank', [BankController::class, 'bank'])->name('bank');
    Route::get('/soal/{nomor}', [BankController::class, 'soal'])->name('soal');
    Route::get('/logout', [BankController::class, 'logout'])->name('logout');
    Route::get('/jawab/{nomor}/{jawab}', [BankController::class, 'jawab'])->name('jawab');
});
