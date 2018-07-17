<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Mail;
use App\Mail\RateChanged;
use App\User;
use App\Entity\Currency;

class SendRateChangedEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var \App\User
    */
    public $user;
    /**
     * @var \App\Entity\Currency
    */
    public $currency;
    /**
     * @var float
    */
    public $oldRate;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user,Currency $currency,float $oldRate)
    {
        $this->user = $user;
        $this->currency = $currency;
        $this->oldRate = $oldRate;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user->email)->send( new RateChanged(
            $this->user->name,
            $this->currency,
            $this->oldRate
        ));
    }
}
