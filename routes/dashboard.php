<?php

use App\Http\Controllers\Api\v1\Dashboard\Admin\Artists\ToggleArtistActivationController as AdminToggleArtistActivationController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Auth\LoginController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Auth\LogoutController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\IndexAlbumsController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\StoreAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\UpdateAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\DestroyCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\IndexCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\ShowCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\StoreCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\ToggleCategoryActivationController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\UpdateCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Companies\IndexCompanyController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Companies\ShowCompanyController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\ContactList\StoreContactListController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\ContactUs\IndexContactUsController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Notification\IndexNotificationController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Notification\ShowNotificationController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Wallets\IndexWalletController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Wallets\StatisticsWalletController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\DestroyAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\ShowAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\ToggleAlbumActivationController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\DestroyArtistController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\IndexArtistController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\ShowArtistController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\StoreArtistController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\ToggleArtistActivationController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\UpdateArtistController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Music\DestroyMusicController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Music\IndexAllMusicController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Music\IndexMusicController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Music\ShowMusicController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Music\StoreMusicController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Music\UpdateMusicController;
use Illuminate\Support\Facades\Route;


/**
 * here we define routes for dashboard
 */

Route::name('dashboard.')->prefix('dashboard')->whereUuid(['id'])->group(function () {
    Route::name('admin.')->prefix('admin')->group(function () {

        Route::post(
            'login',
            LoginController::class
        );

        Route::middleware(['auth:sanctum', 'role:ADMIN'])->group(function () {
            Route::get(
                'logout',
                LogoutController::class
            );
            Route::name('notification.')->prefix('notifications')->group(function () {
                Route::get(
                    '/',
                    IndexNotificationController::class
                )->name('index');
                Route::get(
                    '/{id}',
                    ShowNotificationController::class
                )->name('show');
            });
            Route::name('company.')->prefix('company')->group(function () {
                Route::get(
                    '/',
                    IndexCompanyController::class
                )->name('index');

                Route::get(
                    '/{id}',
                    ShowCompanyController::class
                )->name('show');
            });
            Route::name('category.')->prefix('category')->group(function () {

                Route::get(
                    '/',
                    IndexCategoryController::class
                )->name('index');

                Route::post(
                    '/',
                    StoreCategoryController::class
                )->name('store');

                Route::get(
                    '/{id}',
                    ShowCategoryController::class
                )->name('show');

                Route::patch(
                    '/{id}',
                    UpdateCategoryController::class
                )->name('update');

                Route::delete(
                    '/{id}',
                    DestroyCategoryController::class
                )->name('destroy');

                Route::patch(
                    '/{id}/activate-toggle',
                    ToggleCategoryActivationController::class
                )->name('activate-toggle');
            });

            Route::name('artists.')->prefix('artists')->group(static function () {
                Route::patch(
                    '{id}/activate-toggle',
                    AdminToggleArtistActivationController::class
                )->name('activate-toggle');
            });

            Route::name('contactUs')->prefix('contact-us')->group(static function () {
                Route::get('/', IndexContactUsController::class)->name('index');
            });

            Route::name('wallets.')->prefix('wallets')->group(static function () {
                Route::get('/', IndexWalletController::class)->name('index');

            });

            Route::name('statistics.')->prefix('statistics')->group(static function(){
              Route::get('wallet',StatisticsWalletController::class)->name('wallet');
            });
        });
    });

    Route::middleware('auth:sanctum')->group(function () {
        Route::name('company.')->middleware('role:COMPANY|ADMIN')->prefix('company')->group(function () {
            Route::name('album.')->prefix('album')->group(function () {
                Route::get(
                    '/',
                    IndexAlbumsController::class
                )->name('index');

                Route::post(
                    '/',
                    StoreAlbumController::class
                )->name('store');

                Route::patch(
                    '/{album}',
                    UpdateAlbumController::class
                )->name('update');

                Route::get(
                    '/{album}',
                    ShowAlbumController::class
                )->name('show');

                Route::delete(
                    '/{id}',
                    DestroyAlbumController::class
                )->name('destroy');

                Route::patch(
                    '/{id}/activate-toggle',
                    ToggleAlbumActivationController::class
                )->name('activate-toggle');

                Route::get(
                    '{id}/music',
                    IndexMusicController::class
                )->name('music');
            });

            Route::name('music.')->prefix('music')->group(static function () {
                Route::post(
                    '/',
                    StoreMusicController::class
                )->name('store');

                Route::get(
                    '/{id}',
                    ShowMusicController::class
                )->name('show');

                Route::delete(
                    '/{id}',
                    DestroyMusicController::class
                )->name('destroy');

                Route::get(
                    '/',
                    IndexAllMusicController::class
                )->name('index');

                Route::patch(
                    '/{id}',
                    UpdateMusicController::class
                )->name('update');
            });

            Route::name('artists.')->prefix('artists')->group(function () {

                Route::get(
                    '/',
                    IndexArtistController::class
                )->name('index');

                Route::post(
                    '/',
                    StoreArtistController::class
                )->name('store');

                Route::get(
                    '/{id}',
                    ShowArtistController::class
                )->name('show');

                Route::delete(
                    '/{id}',
                    DestroyArtistController::class
                )->name('destroy');

                Route::patch(
                    '/{id}',
                    UpdateArtistController::class
                )->name('update');

                Route::patch(
                    '/{id}/activate-toggle',
                    ToggleArtistActivationController::class
                )->name('activate-toggle');
            });
        });
    });
});
