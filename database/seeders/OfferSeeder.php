<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    public $data = [
        [
            'description' => '1 offer description',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 100,
            'product_id' => 1,
            'seller_id' => 1,
            'title' => '1 test offer',
        ],
        [
            'description' => '2 offer description',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 200,
            'product_id' => 2,
            'seller_id' => 1,
            'title' => '2 test offer',
        ],
        [
            'description' => '3 offer description',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 2,
            'order' => 1,
            'price' => 300,
            'product_id' => 4,
            'seller_id' => 2,
            'title' => '3 test offer',
        ],
        [
            'description' => '4 offer description',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 400,
            'product_id' => 6,
            'seller_id' => 3,
            'title' => '4 test offer',
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
            DB::table('offer')->insert($dataItem);
        }
    }
}
