<?php

use App\Http\Controllers\Api\v1\Home\ContactUs\StoreContactUsController;
use App\Http\Controllers\Api\v1\Home\Favorites\DestroyFavoriteController;
use App\Http\Controllers\Api\v1\Home\Music\IndexMusicController;
use App\Http\Controllers\Api\v1\Home\Favorites\StoreFavoriteController;
use App\Http\Controllers\Api\v1\Home\Likes\DestroyLikeController;
use App\Http\Controllers\Api\v1\Home\Likes\StoreLikeController;
use App\Http\Controllers\Api\v1\Users\Music\Comments\DestroyCommentController;
use App\Http\Controllers\Api\v1\Users\Music\Comments\StoreCommentController;
use App\Http\Controllers\Api\v1\Users\Music\Comments\UpdateCommentController;
use Illuminate\Support\Facades\Route;

Route::post('/contact-us',StoreContactUsController::class);
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

            Route::delete(
                '/{favoriteId}',
                DestroyFavoriteController::class
            )->name('destroy');
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
