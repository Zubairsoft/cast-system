<?php

use App\Http\Controllers\Api\v1\Users\Comments\StoreCommentController;
use Illuminate\Support\Facades\Route;

Route::name('comments.')->prefix('comments')->group(static function () {
    Route::post(
        '/',
        StoreCommentController::class
    )->name('store');

    
});
