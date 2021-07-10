<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerCatalogSeeder extends Seeder
{
    public $data = [
        [
            'catalog_id' => 1,
            'seller_id' => 1,
        ],
        [
            'catalog_id' => 2,
            'seller_id' => 1,
        ],
        [
            'catalog_id' => 4,
            'seller_id' => 2,
        ],
        [
            'catalog_id' => 6,
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
            DB::table('seller-catalog')->insert($dataItem);
        }
    }
}
