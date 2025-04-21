<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna.index')->middleware('auth');
Route::get('/pengguna/create', [UserController::class, 'create'])->name('pengguna.create')->middleware('auth');
Route::post('/pengguna/store', [UserController::class, 'store'])->name('pengguna.store')->middleware('auth');
Route::get('/pengguna/edit/{user}', [UserController::class, 'edit'])->name('pengguna.edit')->middleware('auth');
Route::put('/pengguna/update/{user}', [UserController::class, 'update'])->name('pengguna.update')->middleware('auth');
route::delete('/pengguna/delete/{user}', [UserController::class, 'destroy'])->name('pengguna.destroy')->middleware('auth');
Route::get('/pengguna/show/{user}', [UserController::class, 'show'])->name('pengguna.show')->middleware('auth');

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index')->middleware('auth');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create')->middleware('auth');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store')->middleware('auth');
Route::get('/buku/edit/{buku}', [BukuController::class, 'edit'])->name('buku.edit')->middleware('auth');
Route::put('/buku/update/{buku}', [BukuController::class, 'update'])->name('buku.update')->middleware('auth');
route::delete('/buku/delete/{buku}', [BukuController::class, 'destroy'])->name('buku.destroy')->middleware('auth');
Route::get('/buku/show/{buku}', [BukuController::class, 'show'])->name('buku.show')->middleware('auth');

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index')->middleware('auth');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create')->middleware('auth');
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store')->middleware('auth');
Route::get('/peminjaman/edit/{peminjaman}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit')->middleware('auth');
Route::put('/peminjaman/update/{peminjaman}', [PeminjamanController::class, 'update'])->name('peminjaman.update')->middleware('auth');
route::delete('/peminjaman/delete/{peminjaman}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy')->middleware('auth');
Route::get('/peminjaman/show/{peminjaman}', [PeminjamanController::class, 'show'])->name('peminjaman.show')->middleware('auth');

Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index')->middleware('auth');
Route::get('/ulasan/create', [UlasanController::class, 'create'])->name('ulasan.create')->middleware('auth');
Route::post('/ulasan/store', [UlasanController::class, 'store'])->name('ulasan.store')->middleware('auth');
Route::get('/ulasan/edit/{ulasan}', [UlasanController::class, 'edit'])->name('ulasan.edit')->middleware('auth');
Route::put('/ulasan/update/{ulasan}', [UlasanController::class, 'update'])->name('ulasan.update')->middleware('auth');
route::delete('/ulasan/delete/{ulasan}', [UlasanController::class, 'destroy'])->name('ulasan.destroy')->middleware('auth');
Route::get('/ulasan/show/{ulasan}', [UlasanController::class, 'show'])->name('ulasan.show')->middleware('auth');

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
