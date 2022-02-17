<?php

use App\Http\Controllers\Api\Gender\Catalog\Category\ItemController;
use App\Http\Controllers\Api\Gender\Catalog\CategoryController;
use App\Http\Controllers\Api\Gender\CatalogController;
use App\Http\Controllers\Api\GenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::apiResource('genders', GenderController::class);
    Route::apiResource('gender/catalogs', CatalogController::class);
    Route::apiResource('gender/catalog/categories', CategoryController::class);
    Route::apiResource('gender/catalog/category/items', ItemController::class);

    Route::get('gender/catalog/categories/item', function () {
    });
});
