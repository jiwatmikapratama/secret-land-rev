<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register-index');
Route::post('/register', [RegisterController::class, 'store'])->name('register-store');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login-index');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login-auth');

// Beranda
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda-index');
