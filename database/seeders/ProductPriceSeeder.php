<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPriceSeeder extends Seeder
{
    public $data = [
        [
            'price_id' => 1,
            'product_id' => 1,
        ],
        [
            'price_id' => 2,
            'product_id' => 2,
        ],
        [
            'price_id' => 3,
            'product_id' => 3,
        ],
        [
            'price_id' => 4,
            'product_id' => 4,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $dataItem) {
            DB::table('product-price')->insert($dataItem);
        }
    }
}
