<?php

use App\Entity\Currency;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    const DATA = [
        [
            'name' => 'Bitcoin',
            'rate' => 725.55
        ],
        [
            'name' => 'Ethereum',
            'rate' => 454.03
        ],
        [
            'name' => 'XRP',
            'rate' => 0.455
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::query()->insert(self::DATA);
    }
}
