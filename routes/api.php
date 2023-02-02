<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\AdvertiserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
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


Route::controller(CategoryController::class)->group(function (){
    Route::group(['prefix' => 'category'], function () {
        Route::get('/', 'index');
        Route::post('store', 'store');
        Route::put('update/{id}', 'update');
        Route::get('destroy/{id}', 'destroy');
    });
});

Route::controller(TagController::class)->group(function (){
    Route::group(['prefix' => 'tag'], function () {
        Route::get('/', 'index');
        Route::post('store', 'store');
        Route::put('update/{id}', 'update');
        Route::get('destroy/{id}', 'destroy');
    });
});

Route::controller(AdvertiserController::class)->group(function (){
    Route::group(['prefix' => 'advertiser'], function () {
        Route::get('/ads/{id}','advertiser_ads');
    });
});

Route::controller(AdController::class)->group(function (){
    Route::group(['prefix' => 'ads'], function () {
        Route::get('/filter','filter');
    });
});

