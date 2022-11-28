<?php

use App\Http\Controllers\Api\v1\Dashboard\Albums\Companies\IndexAlbumsController;
use App\Http\Controllers\Api\v1\Dashboard\Albums\Companies\StoreAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Albums\Companies\UpdateAlbumController;
use App\Http\Controllers\Api\v1\Dashboard\Categories\DestroyCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Categories\IndexCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Categories\ShowCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Categories\StoreCategoryController;
use App\Http\Controllers\Api\v1\Dashboard\Categories\UpdateCategoryController;

/**
 * here we define routes for dashboard
 */

Route::name('dashboard.')->prefix('dashboard')->group(function () {
    Route::name('admin.')->prefix('admin')->group(function () {
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
    Route::name('company.')->prefix('company')->group(function () {
        Route::name('album.')->prefix('album')->group(function () {
            Route::get(
                '/',
                IndexAlbumsController::class
            )->name('index');

            Route::post('/',
            StoreAlbumController::class
            )->name('store');

            Route::patch('/{album}',
            UpdateAlbumController::class
            )->name('update');

            Route::get('/{album}',
            UpdateAlbumController::class
            )->name('show');

            Route::delete('/{id}',
            UpdateAlbumController::class
            )->name('destroy');



        });
    });
});
