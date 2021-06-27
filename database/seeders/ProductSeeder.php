<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public $data = [
        [
            'description' => '1 test description',
            'image' => 'https://picsum.photos/200/300',
            'measurement' => 'кг',
            'order' => 1,
            'price' => 100,
            'seller_id' => 1,
            'title' => '1 test title',
        ],
        [
            'description' => '2 test description',
            'image' => 'https://picsum.photos/200/300',
            'measurement' => 'кг',
            'order' => 1,
            'price' => 200,
            'seller_id' => 1,
            'title' => '2 test title',
        ],
        [
            'description' => '3 test description',
            'image' => 'https://picsum.photos/200/300',
            'measurement' => 'кг',
            'order' => 1,
            'price' => 300,
            'seller_id' => 2,
            'title' => '3 test title',
        ],
        [
            'description' => '4 test description',
            'image' => 'https://picsum.photos/200/300',
            'measurement' => 'кг',
            'order' => 1,
            'price' => 400,
            'seller_id' => 2,
            'title' => '4 test title',
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
            DB::table('product')->insert($dataItem);
        }
    }
}
