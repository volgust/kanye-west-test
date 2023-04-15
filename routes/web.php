<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\QuotesController;
use App\Http\Controllers\FavoriteQuotesController;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function ()
{
    Route::get('quotes', [QuotesController::class, 'index'])
         ->name('quotes');
    Route::get('refreshQuotes', [QuotesController::class, 'getQuotes'])
         ->name('refreshQuotes');

    Route::get('favoriteQuotes', [FavoriteQuotesController::class, 'index'])
         ->name('favoriteQuotes');

    Route::get('getFavoriteQuotes', [FavoriteQuotesController::class, 'getFavoriteQuotes'])
         ->name('getFavoriteQuotes');

    Route::post('addToFavorite', [FavoriteQuotesController::class, 'store'])
         ->name('addToFavorite');

    Route::delete('removeQuote/{quote}', [FavoriteQuotesController::class, 'destroy'])
         ->name('removeQuote');

    Route::post('/tokens/create', function (Request $request) {
        $token = $request->user()->createToken($request->token_name);
        return ['token' => $token->plainTextToken];
    });
});

require __DIR__.'/auth.php';
