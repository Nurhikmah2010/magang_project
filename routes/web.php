<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AssetsController;
use App\Http\Controllers\ClearanceController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/cek', [LoginController::class, 'cekuser'])->name('cekuser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


// DASHBOARD
Route::get('/tes', [DashboardController::class, 'index'])->name('dashboard');

//USER
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::post('/user/tambahuser', [UserController::class, 'tambahuser'])->name('tambahuser');
Route::get('/user/hapususer', [UserController::class, 'hapususer'])->name('hapususer');

// KARYAWAN
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::post('/karyawan/tambah', [KaryawanController::class, 'tambahkaryawan'])->name('tambahkaryawan');

//ASSETS
Route::get('/assets', [AssetsController::class, 'index'])->name('assets');

//CLEARANCE
Route::get('/clearance', [ClearanceController::class, 'index'])->name('clearance');
