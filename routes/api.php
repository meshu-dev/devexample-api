<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    SiteCategoryController,
    SiteController
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


Route::group(['prefix' => 'devsites'], function ($router) {
    Route::group(['prefix' => 'site-categories'], function ($router) {
        Route::get('/', [SiteCategoryController::class, 'getAll']);
    });

    Route::group(['prefix' => 'sites'], function ($router) {
        Route::get('/', [SiteController::class, 'getAllSites']);
        Route::get('/category/{id}', [SiteController::class, 'getCategorySites']);
    });
});
