<?php

use App\Http\Controllers\Api\BackgroundController;
use App\Http\Controllers\Api\DummyController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\Option\ElementController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\Option\FeatureController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\Option\Element\ModelController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\FabricSetController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\FabricSet\FabricController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\FabricSet\FabricModelController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\FabricSet\TextureController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\OptionController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\PicturePosition\PictureSetController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\PicturePosition\PictureController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\PicturePositionController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\SectionController;
use App\Http\Controllers\Api\Gender\Catalog\Category\Item\SizeController;
use App\Http\Controllers\Api\Gender\Catalog\Category\ItemController;
use App\Http\Controllers\Api\Gender\Catalog\CategoryController;
use App\Http\Controllers\Api\Gender\CatalogController;
use App\Http\Controllers\Api\GenderController;
use App\Http\Controllers\Api\SizeTableController;
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

    Route::apiResource('dummies', DummyController::class);

    Route::apiResource('backgrounds', BackgroundController::class);

    Route::apiResource('genders', GenderController::class);
    

    Route::apiResource('gender/catalogs', CatalogController::class);

    Route::apiResource('gender/catalog/categories', CategoryController::class);

    Route::apiResource('gender/catalog/category/items', ItemController::class);

    Route::apiResource('size_tables', SizeTableController::class);

    Route::prefix('gender/catalog/category/item')->group(function () {

        Route::apiResource('/sizes', SizeController::class);

        Route::apiResource('/sections', SectionController::class);

        Route::apiResource('/options', OptionController::class);

        Route::apiResource('/fabric_sets', FabricSetController::class);

        Route::apiResource('/picture_positions', PicturePositionController::class);

        Route::apiResource('/picture_position/picture_set/pictures', PictureController::class);

        Route::apiResource('/picture_position/picture_sets', PictureSetController::class);

        Route::prefix('fabric_set')->group(function () {

            Route::apiResource('/fabrics', FabricController::class);

            Route::apiResource('/fabric_models', FabricModelController::class);

            Route::apiResource('/fabric_model/textures', TextureController::class);

        });

        Route::prefix('option')->group(function () {

            Route::apiResource('/features', FeatureController::class);

            Route::apiResource('/elements', ElementController::class);

            Route::apiResource('/element/models', ModelController::class);

        });
    });
});
