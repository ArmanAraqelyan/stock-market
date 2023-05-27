<?php

namespace App\Listeners;

use App\Events\SendStockDataEmail;
use App\Mail\SendStockEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendStockDataEmailListener implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param SendStockDataEmail $event
     * @return void
     */
    public function handle(SendStockDataEmail $event): void
    {
        Mail::to($event->stockServiceDTO->getEmail())
            ->send(new SendStockEmail($event->companyName, $event->stockServiceDTO));
    }
}
