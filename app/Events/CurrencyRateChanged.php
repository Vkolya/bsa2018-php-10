<?php

namespace App\Events;
 
use Illuminate\Queue\SerializesModels;
use App\Entity\Currency;
 

class CurrencyRateChanged
{
    use SerializesModels;
    /**
     * @var \App\Entity\Currency
    */
    public $currency;
    /**
     * @var float
    */
    public $oldRate;

    /**
     * Create a new event instance.
     *
     * @param  \App\Entity\Currency  $currency
     * @param  float  $oldRate
     * @return void
     */
    public function __construct(Currency $currency,float $oldRate)
    {
        $this->currency = $currency;
        $this->oldRate  = $oldRate;
    }
}
