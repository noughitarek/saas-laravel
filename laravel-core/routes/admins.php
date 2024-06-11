<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestorsController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\Admins\PasswordController;
use App\Http\Controllers\Admins\ConfirmablePasswordController;
use App\Http\Controllers\Admins\AuthenticatedSessionController;

Route::prefix('admins')->group(function(){
    
    Route::middleware('guest:web')->group(function () {
        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware('auth:web')->controller(MainController::class)->group(function () {
        Route::get('/', 'dashboard')->name('dashboard.admins');

        Route::prefix('settings')->name("settings")->group(function () {
            Route::get('', 'settings');
            Route::patch('', 'update');

            Route::prefix('help')->name(".help.")->controller(HelpController::class)->group(function () {
                Route::get('categories', 'categories')->name('categories');
                Route::get('categories/create', 'create_category')->name('create_category');
                Route::post('categories/create', 'store_category');
                Route::get('categories/{category}/edit', 'edit_category')->name('edit_category');
                Route::put('categories/{category}/edit', 'update_category');
                Route::delete('categories/{category}/delete', 'delete_category')->name('delete_category');

                Route::get('faq/create', 'create_faq')->name('create_faq');
                Route::post('faq/create', 'store_faq');
                Route::get('faq/{faq}/edit', 'edit_faq')->name('edit_faq');
                Route::put('faq/{faq}/edit', 'update_faq');
                Route::delete('faq/{faq}/delete', 'delete_faq')->name('delete_faq');


            });
        });

        Route::get('help', 'help')->name('help.admins');
    });
    Route::middleware('auth:web')->controller(UsersController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('admins');
        Route::get('/create', 'create')->name('admins.create');
        Route::post('/create', 'store');
        Route::get('/{admin}/edit', 'edit')->name('admins.edit');
        Route::put('/{admin}/edit', 'update');
        Route::delete('/{admin}/delete', 'destroy')->name('admins.delete');
    });
    Route::middleware('auth:web')->controller(InvestorsController::class)->prefix('investors')->group(function () {
        Route::get('/', 'index')->name('investors');
        Route::get('/create', 'create')->name('investors.create');
        Route::post('/create', 'store');
        Route::get('/{investor}/edit', 'edit')->name('investors.edit');
        Route::put('/{investor}/edit', 'update');
        Route::delete('/{investor}/delete', 'destroy')->name('investors.delete');
    });
    Route::middleware('auth:web')->controller(InformationsController::class)->prefix('informations')->group(function () {
        Route::get('/get', 'index')->name('informations');
        Route::get('{investor}/get', 'investor_index')->name('informations.investor');
        Route::get('/create', 'create')->name('informations.create');
        Route::post('/create', 'store');
        Route::get('/{information}/edit', 'edit')->name('informations.edit');
        Route::put('/{information}/edit', 'update');
        Route::delete('/{information}/delete', 'destroy')->name('informations.delete');
    });

    

    Route::middleware('auth:web')->group(function () {
        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password. ');
        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
        
        Route::get('/password', [PasswordController::class, 'edit'])->name('password.edit');
        Route::put('/password', [PasswordController::class, 'update'])->name('password.update');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('/style', [MainController::class, 'style_edit'])->name('style.edit');
        Route::patch('/style', [MainController::class, 'style_update'])->name('style.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});