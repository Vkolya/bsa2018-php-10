<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SaveCurrencyRateRequest;
use App\Http\Controllers\Controller;
use App\Services\CurrencyServiceInterface;
use App\Events\CurrencyRateChanged;
use Illuminate\Support\Facades\Gate;
use App\Entity\Currency;


class CurrencyController extends Controller
{
    /**
     * @var \App\Services\CurrencyServiceInterface
     */
    private $currencyService;
    /**
     * @param \App\Services\CurrencyServiceInterface $currencyService
    */
    public function __construct(CurrencyServiceInterface $currencyService) {
        $this->currencyService = $currencyService;
    }
    /**
     * Update currency rate in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRate(SaveCurrencyRateRequest $request,int $id)
    {
        $currency = $this->currencyService->findById($id);
        if (Gate::denies('update', Currency::class)) {
             abort(403);
        }
        
        $currency = $this->currencyService->findById($id);
        $oldRate = $currency->rate;
        $currency->rate = $request['rate'];
        $currency->save();
        
        event(new CurrencyRateChanged($currency,$oldRate));
        
        return response()->json($currency,200);
    }
 
}
