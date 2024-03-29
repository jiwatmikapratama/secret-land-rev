<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WisataController;
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
Route::get('/home', [BerandaController::class, 'index'])->name('home');

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register-index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register-store');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login-auth');
Route::post('/logout', [LoginController::class, 'logout']);

// Beranda
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda-index');
Route::get('/beranda-detail/{id}', [BerandaController::class, 'show'])->name('beranda-detail');
Route::get('/beranda-search', [BerandaController::class, 'search'])->name('beranda-search');
Route::get('/beranda-kategori-wisata/{id}', [BerandaController::class, 'filter'])->name('beranda-filter');

// Admin dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-index')->middleware('auth');

// Admin data desa
Route::get('/desa-add', [DesaController::class, 'create'])->name('desa-add')->middleware('auth');
Route::post('/desa', [DesaController::class, 'store']);
Route::get('/dashboard/desa-edit/{id}', [DesaController::class, 'edit'])->name('desa-edit')->middleware('auth');
Route::put('/dashboard/desa/{id}', [DesaController::class, 'update']);
Route::get('/dashboard/desa/{id}', [DesaController::class, 'destroy'])->name('desa-delete');
Route::get('/dashboard/desa/{id}', [DesaController::class, 'destroy'])->name('desa-delete');
Route::get('/dashboard/desa/approve/{id}', [DesaController::class, 'approve'])->name('desa-approve');

// Admin data wisata
Route::get('/wisata-add', [WisataController::class, 'create'])->name('wisata-add')->middleware('auth');
Route::post('/objek_wisata', [WisataController::class, 'store']);
Route::get('/dashboard/wisata-edit/{id}', [WisataController::class, 'edit'])->name('wisata-edit')->middleware('auth');
Route::put('/dashboard/wisata/{id}', [WisataController::class, 'update']);
Route::get('/dashboard/wisata/{id}', [WisataController::class, 'destroy'])->name('wisata-delete');
Route::get('/dashboard/wisata/approve/{id}', [WisataController::class, 'approve'])->name('desa-approve');

// User input wisata dan desa
Route::get('/daftar-wisata', [UserController::class, 'createWisata'])->name('user-daftar-wisata')->middleware('auth');
Route::post('/daftar-wisata', [UserController::class, 'storeWisata']);
Route::get('/daftar-desa', [UserController::class, 'createDesa'])->name('user-daftar-desa')->middleware('auth');
Route::post('/daftar-desa', [UserController::class, 'storeDesa']);
