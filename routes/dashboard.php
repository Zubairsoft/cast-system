<?php

use App\Http\Controllers\Api\v1\Dashboard\Admin\Auth\LoginController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Auth\LogoutController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\IndexAlbumsController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\StoreAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\UpdateAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\DestroyCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\IndexCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\ShowCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\StoreCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Categories\UpdateCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Companies\IndexCompanyController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Companies\ShowCompanyController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Notification\IndexNotificationController;
use App\Http\Controllers\Api\v1\Dashboard\Admin\Notification\ShowNotificationController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\DestroyAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Albums\ShowAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\DestroyArtistController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\IndexArtistController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\ShowArtistController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\StoreArtistController;
use App\Http\Controllers\Api\v1\Dashboard\Companies\Artists\UpdateArtistController;
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
            });
        });
    });
});
