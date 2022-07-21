<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
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


Route::get('/', [DashboardController::class, 'home'])->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/daftar', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/dashboard/profile', [DashboardController::class, 'profile']);

Route::post('select', [DashboardController::class, 'select']);

Route::post('cancel', [DashboardController::class, 'cancel']);

Route::get('/detail-guest/{id}', [DashboardController::class, 'detail_guest']);

Route::get('/detail/{id}', [DashboardController::class, 'detail']);

Route::get('/profile/edit', [DashboardController::class, 'edit_profile']);

Route::post('/save-profile', [DashboardController::class, 'save_profile']);

Route::get('/order/pay', [OrderController::class, 'pendingpay']);

Route::get('/order/confirm', [OrderController::class, 'confirm']);

Route::get('/order/confirmed', [OrderController::class, 'confirmed']);

Route::get('/order/pay/{id}', [OrderController::class, 'pay']);

Route::get('/order', [OrderController::class, 'index']);

Route::post('/booking', [OrderController::class, 'booking']);

Route::post('/paying', [OrderController::class, 'paying']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

Route::get('/admin/belum', [AdminController::class, 'belum'])->middleware('admin');

Route::get('/admin/sudah', [AdminController::class, 'sudah'])->middleware('admin');

Route::get('/admin/kembali', [AdminController::class, 'kembali'])->middleware('admin');

Route::get('/admin/sukses', [AdminController::class, 'sukses'])->middleware('admin');

Route::get('/admin/kendaraan', [AdminController::class, 'kendaraan'])->middleware('admin');

Route::get('/admin/jenis-kendaraan', [AdminController::class, 'jenis_kendaraan'])->middleware('admin');

Route::get('/admin/kendaraan/detail/{id}', [AdminController::class, 'detail'])->middleware('admin');

Route::get('/admin/tambah', [AdminController::class, 'tambah'])->middleware('admin');

Route::get('/admin/kendaraan/edit/{id}', [AdminController::class, 'mengedit'])->middleware('admin');

Route::get('/admin/user', [AdminController::class, 'user'])->middleware('admin');

Route::post('/delete', [AdminController::class, 'delete'])->middleware('admin');

Route::post('/confirm', [AdminController::class, 'confirm'])->middleware('admin');

Route::post('/tambah', [AdminController::class, 'tambah_kendaraan'])->middleware('admin');

Route::post('/pengembalian', [AdminController::class, 'pengembalian'])->middleware('admin');

Route::post('/edit', [AdminController::class, 'edit'])->middleware('admin');

Route::post('/delete-kendaraan', [AdminController::class, 'delete_kendaraan']);

Route::post('/delete-user', [AdminController::class, 'delete_user'])->middleware('admin');

Route::get('/admin/tambah-jenis-kendaraan', [AdminController::class, 'tambah_jenis_kendaraan'])->middleware('admin');

Route::get('/admin/jenis-kendaraan/edit/{$id}', [AdminController::class, 'edit_jenis_kendaraan'])->middleware('admin');

Route::post('/tambah-jenis', [AdminController::class, 'tambah_jenis'])->middleware('admin');

Route::post('/delete-jenis', [AdminController::class, 'delete_jenis'])->middleware('admin');

Route::post('/delete-order', [AdminController::class, 'delete_order'])->middleware('admin');
