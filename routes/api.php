<?php

use App\Http\Controllers\Api\v1\ConfigController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'api\v1', 'prefix' => 'v1', 'middleware' => ['api_lang']], function () {

    Route::get('/start', [ConfigController::class, 'start']);

    Route::group(['prefix' => 'users'], function () {
        Route::post('/login', [UserController::class, 'login']);
        Route::post('/register', [UserController::class, 'register']);
        Route::post('/forget-password', [UserController::class, 'forgetPassword']);
        Route::post('/forget-password/verify-code', [UserController::class, 'verifyCode']);
        Route::post('/reset-password', [UserController::class, 'resetPassword']);
    });

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::group(['prefix' => 'users'], function () {
            Route::get('/info', [UserController::class, 'info']);
            Route::post('/update', [UserController::class, 'update']);
            Route::post('/update-animal-categories', [UserController::class, 'updateAnimalCategories']);
            Route::post('/logout', [UserController::class, 'logout']);
            Route::post('/delete', [UserController::class, 'delete']);
        });
    });
});
