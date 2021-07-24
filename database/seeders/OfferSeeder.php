<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    public $data = [
        [
            'catalog_id' => 4,
            'description' => 'Описание Предложение Говядина Томск 1',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 100,
            'is_active' => true,
            'seller_id' => 3,
            'title' => 'Предложение Говядина Томск 1',
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'catalog_id' => 4,
            'description' => 'Описание Предложение Говядина Томск 2',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 200,
            'is_active' => true,
            'seller_id' => 1,
            'title' => 'Предложение Говядина Томск 2',
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'catalog_id' => 4,
            'description' => 'Описание Предложение Говядина Новосибирск 1',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 100,
            'is_active' => true,
            'seller_id' => 1,
            'title' => 'Предложение Говядина Новосибирск 1',
            'country_id' => 1,
            'region_id' => 2,
            'city_id' => 4,
        ],
        [
            'catalog_id' => 6,
            'description' => 'Описание Предложение молоко Томск',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 200,
            'is_active' => true,
            'seller_id' => 1,
            'title' => 'Предложение молоко Томск',
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'catalog_id' => 5,
            'description' => 'Описание Предложение курица Новосибирск',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 2,
            'order' => 1,
            'price' => 300,
            'is_active' => true,
            'seller_id' => 2,
            'title' => 'Предложение курица Новосибирск',
            'country_id' => 1,
            'region_id' => 2,
            'city_id' => 4,
        ],
        [
            'catalog_id' => 7,
            'description' => 'Описание Предложение кефир Новосибирск',
            'image' => 'https://picsum.photos/200/300',
            'measure_id' => 1,
            'order' => 1,
            'price' => 400,
            'is_active' => true,
            'seller_id' => 3,
            'title' => 'Предложение кефир Новосибирск',
            'country_id' => 1,
            'region_id' => 2,
            'city_id' => 4,
        ],
        [
            'catalog_id' => 4,
            'description' => 'Описание Предложение говядина Томск',
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
