<?php

namespace App\Services;

use App\Services\CurrencyServiceInterface;
use App\Entity\Currency;
 
class CurrencyService implements CurrencyServiceInterface
{
     
    /**
     * Returns currency by id.
     *
     * @param  int $id
     * @return Currency|null
    */
    public function findById(int $id): ?Currency
    {
        return Currency::findOrFail($id);
    }
    
}