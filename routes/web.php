<?php
use App\Http\Controllers\admin\RuanganControllers;
use App\Http\Controllers\Admin\UserControllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\DashboardControllers;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/admin/ruangan', [RuanganControllers::class,'index'])->name('admin.ruangan.index');
Route::get('/admin/ruangan/create', [RuanganControllers::class, 'create'])->name('admin.ruangan.create');
Route::post('/admin/ruangan', [RuanganControllers::class, 'store'])->name('admin.ruangan.store');
Route::get('/admin/ruangan/{id}/edit', [RuanganControllers::class,'edit'])->name('admin.ruangan.edit');
Route::put('/admin/ruangan/{id}', [RuanganControllers::class, 'update'])->name('admin.ruangan.update');
Route::delete('/admin/ruangan/{id}', [RuanganControllers::class, 'destroy'])->name('admin.ruangan.destroy');

Route::get('/admin/user', [UserControllers::class,'index'])->name('admin.user.index');
Route::get('/admin/user/create', [UserControllers::class, 'create'])->name('admin.user.create');
Route::post('/admin/user', [UserControllers::class,'store'])->name('admin.user.store');
Route::get('/admin/user/{id}/edit', [UserControllers::class, 'edit'])->name('admin.user.edit');
Route::put('/admin/user/{id}', [UserControllers::class, 'update'])->name('admin.user.update');
Route::delete('/admin/user/{id}', [UserControllers::class, 'destroy'])->name('admin.user.destroy');

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'callback']);

Route::get('/admin/dashboard', [DashboardControllers::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
