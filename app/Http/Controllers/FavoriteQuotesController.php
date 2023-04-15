<?php

namespace App\Http\Controllers;

use App\Models\FavoriteQuotes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

class FavoriteQuotesController extends Controller
{
    public function index() {
        return Inertia::render('FavoriteQuotes', [
            'favoriteQuotes' => $this->getFavoriteQuotes()->getData(),
        ]);
    }

    public function getFavoriteQuotes(): JsonResponse {

        return response()->json(FavoriteQuotes::all()->toArray());;
    }

    public function destroy($quote) {
        $quote = FavoriteQuotes::where('quote', $quote);

        $quote->delete();
    }

    public function store(Request $request) {
        $model = new FavoriteQuotes([
           'quote' => $request->quote,
        ]);

        $model->save();
    }
}
