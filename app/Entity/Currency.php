<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
 
class Currency extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
    */
    protected $fillable = [
        'name', 'rate'
    ];
    
}
