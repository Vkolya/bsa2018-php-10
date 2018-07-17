<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Entity\Currency;

class RateChanged extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
    */
    private $userName;
    /**
     * @var \App\Entity\Currency
    */
    private $currency;
    /**
     * @var float
    */
    private $oldRate;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $userName,Currency $currency,float $oldRate)
    {
        $this->userName = $userName;
        $this->currency = $currency;
        $this->oldRate = $oldRate;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.rate_changed')
            ->with([
                'userName' => $this->userName,
                'currency' => $this->currency,
                'oldRate' => $this->oldRate
            ]);
    }
}
