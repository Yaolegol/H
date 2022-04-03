<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalePointOfferSeeder extends Seeder
{
    public $data = [
        [
            'sale_point_id' => 1,
            'offer_id' => 1,
        ],
        [
            'sale_point_id' => 2,
            'offer_id' => 1,
        ],
        [
            'sale_point_id' => 3,
            'offer_id' => 3,
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $dataItem) {
            DB::table('sale_point_offer')->insert($dataItem);
        }
    }
}
