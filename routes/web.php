<?php

require __DIR__ . '/auth.php';

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/manage', [UserController::class, 'userManage'])->name('user.manage');
    Route::get('profile', [ProfileController::class, 'index']);
    Route::resource('profile', ProfileController::class);
    Route::get('update-password/{id}', [ProfileController::class, 'updatePassword'])->name('update.password');
});

Route::group(['middleware' => ['role:admin'], 'auth'], function () {
    Route::get('user/add', [UserController::class, 'create']);
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::resource('users', UserController::class);
    Route::get('users', [UserController::class, 'destroy'])->name('users.suspend');
});

