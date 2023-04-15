<?php

namespace App\Http\Controllers\Api;

use App\Models\FavoriteQuotes;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use PhpParser\Node\Expr\Array_;
use Illuminate\Http\JsonResponse;


class FavoriteQuotesApiController extends Controller
{
    public function getFavoriteQuotes(): JsonResponse {

        return response()->json(FavoriteQuotes::all()->toArray());
    }
}
