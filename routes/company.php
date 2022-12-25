<?php

use App\Http\Controllers\Api\v1\Users\Account\Companies\Auth\RegisterController;
use App\Http\Controllers\Api\v1\Users\Account\Companies\Auth\LoginController;
use App\Http\Controllers\Api\v1\Users\Account\Companies\Auth\LogoutController;

use Illuminate\Support\Facades\Route;

Route::name('account.')->prefix('/account')->group(function () {

    Route::name('company.')->prefix('company')->group(function () {
        Route::post(
            '/register',
            RegisterController::class
        )->name('register');

        Route::post(
            'login',
            LoginController::class
        )->name('login');

        Route::middleware('auth:sanctum')->group(function () {
            Route::get(
                'logout',
                LogoutController::class
            )->name('logout');
        });
    });
});
