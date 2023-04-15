<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\QuotesApiController;
use App\Http\Controllers\Api\FavoriteQuotesApiController;
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
//
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function ()
{
    Route::get('favorite_quotes', [FavoriteQuotesApiController::class, 'getFavoriteQuotes']);
    Route::get('quotes/{count}', [QuotesApiController::class, 'getQuotes']);
    Route::get('quotes', [QuotesApiController::class, 'getQuotes']);
});
