<?php

use App\Http\Controllers\Api\v1\Home\Music\IndexMusicController;
use App\Http\Controllers\Api\v1\Users\Favorites\StoreFavoriteController;
use App\Http\Controllers\Api\v1\Users\Likes\DestroyLikeController;
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

Route::name('music.')->prefix('music')->group(static function () {

    Route::get(
        '/',
        IndexMusicController::class
    )->name('index');

    Route::prefix('{id}')->group(static function () {
        Route::name('likes')->prefix('likes')->group(static function () {
            Route::post(
                '/',
                StoreLikeController::class
            )->name('store');

            Route::delete(
                '/',
                DestroyLikeController::class
            )->name('destroy');
        });

        Route::name('favorite.')->prefix('favorite')->group(static function () {
            Route::post(
                '/',
                StoreFavoriteController::class
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
});
