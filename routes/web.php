<?php

// use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');
// Route::get('/admin/user/coba', [UserController::class, 'ajaxList'])->name("admin.ajaxlist");

require __DIR__.'/auth.php';
