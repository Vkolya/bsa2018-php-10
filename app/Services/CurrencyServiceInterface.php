<?php

namespace App\Services;
 
interface CurrencyServiceInterface
{
    /**
    * @return mixed
    */ 
    public function findById(int $id);
   
}