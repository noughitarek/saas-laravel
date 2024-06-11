<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainInvestorController;
use App\Http\Controllers\InvestorsProfileController;
use App\Http\Controllers\Investors\InvestorsPasswordController;
use App\Http\Controllers\Investors\InvestorsConfirmablePasswordController;
use App\Http\Controllers\Investors\InvestorsAuthenticatedSessionController;

Route::prefix('investors')->group(function(){
    Route::middleware('guest:investor')->group(function () {
        Route::get('login', [InvestorsAuthenticatedSessionController::class, 'create'])->name('investors.login');
        Route::post('login', [InvestorsAuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('auth:investor')->controller(MainInvestorController::class)->group(function () {
        Route::get('/', 'dashboard')->name('dashboard.investors');
        Route::get('/settings', 'settings')->name('settings.investors');
        Route::patch('/settings', 'update_settings.investors');
        Route::get('help', 'help')->name('help.investors');
    });


    Route::middleware('auth:investor')->name('investors.')->group(function () {
        Route::get('confirm-password', [InvestorsConfirmablePasswordController::class, 'show'])->name('password. ');
        Route::post('confirm-password', [InvestorsConfirmablePasswordController::class, 'store']);

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        
        Route::get('/password', [InvestorsPasswordController::class, 'edit'])->name('password.edit');
        Route::put('/password', [InvestorsPasswordController::class, 'update'])->name('password.update');

        Route::get('/profile', [InvestorsProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [InvestorsProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [InvestorsProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/style', [MainInvestorController::class, 'style_edit'])->name('style.edit');
        Route::patch('/style', [MainInvestorController::class, 'style_update'])->name('style.update');

    });
});