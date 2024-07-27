<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\WorkspaceController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SiteController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
});



Route::apiResource('workspaces', WorkspaceController::class);

Route::group([
    'prefix' => 'workspaces',
    'middleware' => 'auth:api'
], function () {


    Route::group([
        'prefix' => '{workspace}/projects',
    ], function () {
        Route::get('/', [ProjectController::class, 'index']);
        Route::post('/', [ProjectController::class, 'store']);
        Route::get('/{project}', [ProjectController::class, 'show']);
        Route::put('/{project}', [ProjectController::class, 'update']);
        Route::delete('/{project}', [ProjectController::class, 'destroy']);
    });

    Route::group([
        'prefix' => '{workspace}/sites',
    ], function () {

        Route::get('/', [SiteController::class, 'index']);
        Route::post('/', [SiteController::class, 'store']);
        Route::get('/{site}', [SiteController::class, 'show']);
        Route::put('/{site}', [SiteController::class, 'update']);
        Route::delete('/{site}', [SiteController::class, 'destroy']);

    });

});
