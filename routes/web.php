<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;

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


// DASHBOARD
Route::get('/tes', [DashboardController::class, 'index'])->name('dashboard');

//USER
Route::get('/user', [UserController::class, 'index'])->name('user');
