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
});