<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    public $data = [
        [
            'catalog_id' => 4,
            'description' => 'Описание 1',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 100,
            'seller_id' => 1,
            'title' => 'Предложение Говядина',
        ],
        [
            'catalog_id' => 6,
            'description' => 'Описание 2',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 200,
            'seller_id' => 1,
            'title' => 'Предложение молоко',
        ],
        [
            'catalog_id' => 5,
            'description' => 'Описание 3',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 2,
            'order' => 1,
            'price' => 300,
            'seller_id' => 2,
            'title' => 'Предложение курица',
        ],
        [
            'catalog_id' => 7,
            'description' => 'Описание 4',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 400,
            'seller_id' => 3,
            'title' => 'Предложение кефир',
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
