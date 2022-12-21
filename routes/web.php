<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [BerandaController::class, 'index'])->name('home')->middleware('auth');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register-index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register-store');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login-auth');
Route::post('/logout', [LoginController::class, 'logout']);

// Beranda
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda-index')->middleware('auth');

// Admin dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-index')->middleware('auth');

// Admin data desa
Route::get('/desa-add', [DesaController::class, 'create'])->name('desa-add')->middleware('auth');
Route::post('/desa', [DesaController::class, 'store']);
Route::get('/dashboard/desa-edit/{id}', [DesaController::class, 'edit'])->name('desa-edit')->middleware('auth');
Route::put('/desa/{id}', [DesaController::class, 'update']);
