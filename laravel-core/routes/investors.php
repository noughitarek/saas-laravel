<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainInvestorController;
use App\Http\Controllers\Investors\InvestorsAuthenticatedSessionController;

Route::prefix('investors')->group(function(){
    Route::middleware('guest:investor')->group(function () {
        Route::get('login', [InvestorsAuthenticatedSessionController::class, 'create'])->name('investors.login');
        Route::post('login', [InvestorsAuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('auth:investor')->controller(MainInvestorController::class)->prefix('dashboard')->group(function () {
        Route::get('/', 'dashboard')->name('dashboard.investors');
    });

    Route::middleware('auth:investor')->name('investors.')->group(function () {
        Route::get('confirm-password', [InvestorsConfirmablePasswordController::class, 'show'])->name('password.confirm');
        Route::post('confirm-password', [InvestorsConfirmablePasswordController::class, 'store']);
        Route::put('password', [InvestorsPasswordController::class, 'update'])->name('password.update');
        Route::post('logout', [InvestorsAuthenticatedSessionController::class, 'destroy'])->name('logout');
        Route::get('/profile', [InvestorsProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [InvestorsProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [InvestorsProfileController::class, 'destroy'])->name('profile.destroy');
    });
});