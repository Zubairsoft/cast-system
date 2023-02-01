<?php

use App\Http\Controllers\Api\v1\Users\Likes\StoreLikeController;
use App\Http\Controllers\Api\v1\Users\Music\Comments\DestroyCommentController;
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
    Route::name('likes')->prefix('likes')->group(static function () {
        Route::post(
            '/',
            StoreLikeController::class
        )->name('store');
    });

    Route::name('comments.')->prefix('comments')->group(static function () {
        Route::post(
            '/',
            StoreCommentController::class
        )->name('store');

        Route::patch(
            '/{commentId}',
            UpdateCommentController::class
        )->name('update');

        Route::delete(
            '/{commentId}',
            DestroyCommentController::class
        )->name('update');
    });
});
