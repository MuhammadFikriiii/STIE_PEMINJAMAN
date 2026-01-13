<?php

use App\Http\Controllers\admin\RuanganControllers;
use App\Http\Controllers\peminjam\RuanganControllers as PeminjamRuanganControllers;
use App\Http\Controllers\Admin\UserControllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\admin\DashboardControllers;
use App\Http\Controllers\peminjam\BorrowRoomControllers;

Route::get('/', function () {
    return view('auth.login');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/ruangan', [RuanganControllers::class, 'index'])->name('admin.ruangan.index');
    Route::get('/ruangan/create', [RuanganControllers::class, 'create'])->name('admin.ruangan.create');
    Route::post('/ruangan', [RuanganControllers::class, 'store'])->name('admin.ruangan.store');
    Route::get('/ruangan/{id}/edit', [RuanganControllers::class, 'edit'])->name('admin.ruangan.edit');
    Route::put('/ruangan/{id}', [RuanganControllers::class, 'update'])->name('admin.ruangan.update');
    Route::delete('/ruangan/{id}', [RuanganControllers::class, 'destroy'])->name('admin.ruangan.destroy');

    Route::get('/user', [UserControllers::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [UserControllers::class, 'create'])->name('admin.user.create');
    Route::post('/user', [UserControllers::class, 'store'])->name('admin.user.store');
    Route::get('/user/{id}/edit', [UserControllers::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/{id}', [UserControllers::class, 'update'])->name('admin.user.update');
    Route::delete('/user/{id}', [UserControllers::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/dashboard', [DashboardControllers::class, 'index'])->name('dashboard');
});

Route::prefix('peminjam')->middleware(['auth', 'peminjam'])->group(function () {
    Route::get('/ruangan', [PeminjamRuanganControllers::class, 'index'])->name('peminjam.ruangan.index');
    Route::get('/ruangan/{ruangan}/pinjam', [BorrowRoomControllers::class, 'create'])->name('peminjam.borrow.create');
    Route::post('/ruangan/pinjam', [BorrowRoomControllers::class, 'store'])->name('borrowRooms');
    Route::get('/peminjaman', [BorrowRoomControllers::class, 'index'])->name('peminjam.peminjaman.index');
});

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';