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

Route::middleware('auth')->group(function() {
    Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');
    Route::get('/admin/user/list', [App\Http\Controllers\Admin\UserController::class, 'ajaxList'])->name("admin.user.list");
    Route::get('/admin/user/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name("admin.user.create");
    Route::get('/admin/user/{id}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name("admin.user.edit");
    Route::post('/admin/user/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name("admin.user.store");
    Route::get('/admin/user/{id}/detail', [App\Http\Controllers\Admin\UserController::class, 'detail'])->name("admin.user.detail");
    Route::post('/admin/user/delete', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name("admin.user.delete");
});

require __DIR__.'/auth.php';
