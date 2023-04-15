<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class QuoteService
{
    public function getQuotes($count = 1):JsonResponse
    {
        $quotes = [];
        for ($i = 0; $i < $count; $i++) {
            $client = new \GuzzleHttp\Client();
            $res = $client->get('https://api.kanye.rest/text');
            array_push($quotes, $res->getBody()->getContents());
        }

        return response()->json($quotes);
    }
}
