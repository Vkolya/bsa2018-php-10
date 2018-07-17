<?php

namespace App\Listeners;

use App\Events\CurrencyRateChanged;
use App\Jobs\SendRateChangedEmail;
use App\User;

class SendCurrencyRateNotification 
{
    
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Event  $event
     * @return void
     */
    public function handle(CurrencyRateChanged $event)
    {
        $users = User::withoutAdmins()->get();
        foreach ($users as $user) {
            SendRateChangedEmail::dispatch($user,$event->currency,$event->oldRate)->onQueue('notification');;
        }
    }
}
