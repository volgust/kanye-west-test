<?php

namespace App\Http\Controllers\Api;

use App\Models\FavoriteQuotes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;
use App\Http\Controllers\Controller;
use App\Services\QuoteService;


class QuotesApiController extends Controller
{
    private $quoteService;

    public function __construct(QuoteService $quoteService)
    {
        $this->quoteService = $quoteService;
    }
    public function getQuotes($count = 1): JsonResponse {

        return response()->json($this->quoteService->getQuotes($count));
    }
}
