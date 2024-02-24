<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Middleware\GuestUser;

use App\Http\Controllers\{
    CountryController,
    SiteCategoryController,
    SiteController,
    StatusController
};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'devsites'], function () {
    Route::get('/categories', [SiteCategoryController::class, 'getAll']);
    Route::get('/', [SiteController::class, 'getAllSites']);
});

/*
Route::group(['prefix' => 'projects'], function () {
    Route::get('/', [SiteController::class, 'getAllSites']);
}); */

Route::middleware([GuestUser::class])->group(function () {
    Route::group(['prefix' => 'countries'], function () {
        Route::get('/',        [CountryController::class, 'getAll']);
        Route::get('/{id}',    [CountryController::class, 'get']);
        Route::post('/',       [CountryController::class, 'add']);
        Route::put('/{id}',    [CountryController::class, 'edit']);
        Route::delete('/{id}', [CountryController::class, 'delete']);
    });

    Route::get('/me', [StatusController::class, 'getCurrentGuestUser']);
});
