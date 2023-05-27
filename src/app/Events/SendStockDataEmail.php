<?php

namespace App\Events;

use App\DTO\StockServiceDTO;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendStockDataEmail
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param StockServiceDTO $stockServiceDTO
     */
    public function __construct(
        public string $companyName,
        public StockServiceDTO $stockServiceDTO
    )
    {}
}
