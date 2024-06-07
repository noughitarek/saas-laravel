<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestorsController;
use App\Http\Controllers\Admins\PasswordController;
use App\Http\Controllers\Admins\ConfirmablePasswordController;
use App\Http\Controllers\Admins\AuthenticatedSessionController;

Route::prefix('admins')->group(function(){
    
    Route::middleware('guest')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('auth')->controller(MainController::class)->prefix('dashboard')->group(function () {
        Route::get('/', 'dashboard')->name('dashboard');
    });
    Route::middleware('auth')->controller(UsersController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('admins');
        Route::get('/create', 'create')->name('admins.create');
        Route::post('/create', 'store');
        Route::get('/{admin}/edit', 'edit')->name('admins.edit');
        Route::put('/{admin}/edit', 'update');
        Route::delete('/{admin}/delete', 'destroy')->name('admins.delete');
    });
    Route::middleware('auth')->controller(InvestorsController::class)->prefix('investors')->group(function () {
        Route::get('/', 'index')->name('investors');
        Route::get('/create', 'create')->name('investors.create');
        Route::post('/create', 'store');
        Route::get('/{investor}/edit', 'edit')->name('investors.edit');
        Route::put('/{investor}/edit', 'update');
        Route::delete('/{investor}/delete', 'destroy')->name('investors.delete');
    });

    Route::middleware('auth')->group(function () {
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);
        Route::put('password', [PasswordController::class, 'update'])->name('password.update');
        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});