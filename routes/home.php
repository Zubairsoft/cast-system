<?php

use App\Http\Controllers\Api\v1\Users\Music\Comments\StoreCommentController;
use App\Http\Controllers\Api\v1\Users\Music\Comments\UpdateCommentController;
use Illuminate\Support\Facades\Route;

Route::name('comments.')->prefix('comments')->group(static function () {
    Route::post(
        '/',
        StoreCommentController::class
    )->name('store');
});

Route::name('music.')->prefix('music/{id}')->group(static function () {
    Route::name('comments.')->prefix('comments')->group(static function () {
        Route::post(
            '/',
            StoreCommentController::class
        )->name('store');
        Route::patch(
            '/{commentId}',
            UpdateCommentController::class
        )->name('update');
    });

});
