<?php

namespace App\Contracts;

use App\DTO\StockServiceDTO;

interface RapidAPIContract
{
    public function getHistoricalQuotes(StockServiceDTO $stockServiceDTO): array;
}
