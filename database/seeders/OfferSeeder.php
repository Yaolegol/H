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
            'is_active' => true,
            'seller_id' => 1,
            'title' => 'Предложение Говядина',
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'catalog_id' => 6,
            'description' => 'Описание 2',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 200,
            'is_active' => true,
            'seller_id' => 1,
            'title' => 'Предложение молоко',
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'catalog_id' => 5,
            'description' => 'Описание 3',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 2,
            'order' => 1,
            'price' => 300,
            'is_active' => true,
            'seller_id' => 2,
            'title' => 'Предложение курица',
            'country_id' => 1,
            'region_id' => 2,
            'city_id' => 4,
        ],
        [
            'catalog_id' => 7,
            'description' => 'Описание 4',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 400,
            'is_active' => true,
            'seller_id' => 3,
            'title' => 'Предложение кефир',
            'country_id' => 1,
            'region_id' => 2,
            'city_id' => 4,
        ],
        [
            'catalog_id' => 4,
            'description' => 'Описание 5',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 800,
            'is_active' => true,
            'seller_id' => 4,
            'title' => 'Предложение говядина',
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
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
