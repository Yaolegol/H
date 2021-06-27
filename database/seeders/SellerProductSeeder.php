<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerProductSeeder extends Seeder
{
    public $data = [
        [
            'product_id' => 1,
            'seller_id' => 1,
        ],
        [
            'product_id' => 2,
            'seller_id' => 1,
        ],
        [
            'product_id' => 3,
            'seller_id' => 2,
        ],
        [
            'product_id' => 4,
            'seller_id' => 3,
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
            DB::table('seller-product')->insert($dataItem);
        }
    }
}
