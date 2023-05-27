<?php

namespace App\Mail;

use App\DTO\StockServiceDTO;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendStockEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct
    (
        public string $companyName,
        public StockServiceDTO $stockServiceDTO
    )
    {}

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->companyName)
            ->view('emails.send-email')
            ->with($this->stockServiceDTO->toArray());
    }
}
