<?php

namespace App\Http\Controllers;

use App\Models\FavoriteQuotes;
use App\Services\QuoteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

class QuotesController extends Controller
{
    private $quoteService;

    public function __construct(QuoteService $quoteService) {
        $this->quoteService = $quoteService;
    }
    public function index() {
        return Inertia::render('Quotes', [
            'quotes' => $this->quoteService->getQuotes(5)->getData(),
        ]);
    }
}
