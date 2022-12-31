<?php


use App\Http\Controllers\Api\v1\Users\Account\Companies\Auth\LogoutController as AuthLogoutController;
use App\Http\Controllers\Api\v1\Users\Account\Companies\Auth\RegisterController as AuthRegisterController;
use App\Http\Controllers\Api\v1\Users\Account\Password\ForgetPasswordController;
use App\Http\Controllers\Api\v1\Users\Account\Password\ResetPasswordController;

use App\Http\Controllers\Api\v1\Users\Account\Users\Auth\LoginController;
use App\Http\Controllers\Api\v1\Users\Account\Users\Auth\LogoutController;
use App\Http\Controllers\Api\v1\Users\Account\Users\Auth\RegisterController;
use App\Http\Controllers\Api\v1\Users\Account\Profile\ProfileController;
use App\Http\Controllers\Api\v1\Users\Account\Verification\SendVerificationCodeController;
use App\Http\Controllers\Api\v1\Users\Account\Verification\VerificationCodeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::name('account.')->prefix('/account')->group(function () {

    Route::post(
        'register',
        RegisterController::class
    )->name('register');

    Route::post(
        'login',
        LoginController::class
    )->name('login');

    Route::post(
        'sendVerificationCode',
        SendVerificationCodeController::class
    )->name('send_verification_code');

    Route::post(
        'verification/{code}',
        VerificationCodeController::class
    )->name('verification_code');

    Route::name('password.')->prefix('password')->group(function () {
        Route::post(
            'forget',
            ForgetPasswordController::class
        )->name('forget');

        Route::post(
            'reset',
            ResetPasswordController::class
        )->name('reset');
    });

    Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
        Route::get(
            'logout',
            LogoutController::class
        )->name('logout');

        Route::get(
            'me',
            ProfileController::class
        )->name('me');
    });
});
