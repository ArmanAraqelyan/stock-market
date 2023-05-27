<?php

namespace App\Services;

use App\Contracts\RapidAPIContract;
use App\DTO\StockServiceDTO;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class RapidAPIService implements RapidAPIContract
{
    private string $historicalQuotesUrl = '/stock/v3/get-historical-data';
    private PendingRequest $http;
    public function __construct()
    {
        $this->http = Http::withHeaders([
            'X-RapidAPI-Key' => config('api.rapid.api-key'),
            'X-RapidAPI-Host' => config('api.rapid.api-host'),
        ]);
    }

    public function getHistoricalQuotes(StockServiceDTO $stockServiceDTO): array
    {
        $response = $this->http->get(config('api.rapid.api-url'). $this->historicalQuotesUrl, [
            'symbol' => $stockServiceDTO->getCompanySymbol(),
            'from' => $stockServiceDTO->getStartDate(),
            'to' => $stockServiceDTO->getEndDate()
        ]);

        return $response->json();
    }
}
