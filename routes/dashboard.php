<?php

use App\Http\Controllers\Api\v1\Categories\DestroyCategoryController;
use App\Http\Controllers\Api\v1\Categories\IndexCategoryController;
use App\Http\Controllers\Api\v1\Categories\ShowCategoryController;
use App\Http\Controllers\Api\v1\Categories\StoreCategoryController;
use App\Http\Controllers\Api\v1\Categories\UpdateCategoryController;

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
});
