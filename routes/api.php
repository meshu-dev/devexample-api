<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    CountryController,
    SiteCategoryController,
    SiteController,
    StatusController
};
use App\Http\Middleware\GuestUser;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'devsites'], function () {
    Route::get('/', [SiteController::class, 'getAllSites']);
    Route::get('/categories', [SiteCategoryController::class, 'getAll']);
    Route::get('/categorized/{categoryId}', [SiteController::class, 'getAllByCategory']);
});

Route::middleware([GuestUser::class])->group(function () {
    Route::group(['prefix' => 'countries'], function () {
        Route::get('/', [CountryController::class, 'getAll']);
        Route::get('/{id}', [CountryController::class, 'get']);
        Route::post('/', [CountryController::class, 'add']);
        Route::put('/{id}', [CountryController::class, 'edit']);
        Route::delete('/{id}', [CountryController::class, 'delete']);
    });

    Route::get('/me', [StatusController::class, 'getCurrentGuestUser']);
});
