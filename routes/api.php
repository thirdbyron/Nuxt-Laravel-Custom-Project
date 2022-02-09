<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\Item\DefaultsController;
use App\Http\Controllers\Api\Item\Settings\ColorController;
use App\Http\Controllers\Api\Item\Settings\ElementController;
use App\Http\Controllers\Api\Item\Settings\Option\OptionController;
use App\Http\Controllers\Api\Item\Settings\PictureController;
use App\Http\Controllers\Api\Item\SizeController;
use App\Http\Controllers\Api\ItemController;
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
    Route::apiResource( 'categories', CategoryController::class );
    Route::apiResource( 'items', ItemController::class );
    Route::apiResource( 'item/defaults', DefaultsController::class );
    Route::apiResource( 'item/sizes', SizeController::class );
    Route::apiResource( 'item/settings/colors', ColorController::class );
    Route::apiResource( 'item/settings/elements', ElementController::class );
    Route::apiResource( 'item/settings/pictures', PictureController::class );
    Route::apiResource( 'item/settings/options', OptionController::class );
});