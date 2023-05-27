<?php

namespace App\Http\Controllers;

use App\Contracts\PkgStoreContract;
use App\Contracts\RapidAPIContract;
use App\DTO\StockServiceDTO;
use App\Events\SendStockDataEmail;
use App\Http\Requests\StockMarketRequest;

class StockServiceController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function quotes(
        StockMarketRequest $request,
        StockServiceDTO $stockServiceDTO,
        RapidAPIContract $rapidAPIService,
        PkgStoreContract $pkgStoreContract
    )
    {
        $stockService = $stockServiceDTO::init($request->validated());
        try {
            $quotes = [];
            if ($companyName = $pkgStoreContract->getResponse()->getCompanyName($stockService->getCompanySymbol())) {
                $quotes = $rapidAPIService->getHistoricalQuotes($stockService)["prices"] ?? [];
                event(new SendStockDataEmail($companyName, $stockService));
            }
        }catch (\Exception $exception) {
            return ['error' => $exception->getMessage()];
        }

        return view('quotes', compact('quotes'))->with($stockService->toArray());
    }
}
