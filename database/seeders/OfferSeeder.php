<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    public $data = [
        [
            'title' => 'Предложение Говядина Томск 1',
            'description' => 'Описание Предложение Говядина Томск 1',
            'order' => 1,
            'price' => 100,
            'photo_1' => 'https://picsum.photos/200/300',
            'photo_2' => 'https://picsum.photos/200/300',
            'photo_3' => 'https://picsum.photos/200/300',
            'is_active' => true,
            'user_id' => 3,
            'catalog_level_two_id' => 1,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'title' => 'Предложение Говядина Томск 2',
            'description' => 'Описание Предложение Говядина Томск 2',
            'order' => 1,
            'price' => 200,
            'photo_1' => 'https://picsum.photos/200/300',
            'is_active' => true,
            'user_id' => 1,
            'catalog_level_two_id' => 1,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'title' => 'Предложение Говядина Новосибирск 1',
            'description' => 'Описание Предложение Говядина Новосибирск 1',
            'order' => 1,
            'price' => 100,
            'photo_1' => 'https://picsum.photos/200/300',
            'photo_2' => 'https://picsum.photos/200/300',
            'is_active' => true,
            'user_id' => 1,
            'catalog_level_two_id' => 1,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 2,
            'city_id' => 4,
        ],
        [
            'title' => 'Предложение молоко Томск',
            'description' => 'Описание Предложение молоко Томск',
            'order' => 1,
            'price' => 200,
            'is_active' => true,
            'user_id' => 1,
            'catalog_level_two_id' => 3,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'title' => 'Предложение курица Новосибирск',
            'description' => 'Описание Предложение курица Новосибирск',
            'order' => 1,
            'price' => 300,
            'photo_1' => 'https://picsum.photos/200/300',
            'photo_2' => 'https://picsum.photos/200/300',
            'photo_3' => 'https://picsum.photos/200/300',
            'is_active' => true,
            'user_id' => 2,
            'catalog_level_two_id' => 2,
            'measure_id' => 2,
            'country_id' => 1,
            'region_id' => 2,
            'city_id' => 4,
        ],
        [
            'title' => 'Предложение кефир Новосибирск',
            'description' => 'Описание Предложение кефир Новосибирск',
            'order' => 1,
            'price' => 400,
            'photo_1' => 'https://picsum.photos/200/300',
            'photo_2' => 'https://picsum.photos/200/300',
            'photo_3' => 'https://picsum.photos/200/300',
            'is_active' => true,
            'user_id' => 3,
            'catalog_level_two_id' => 4,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 2,
            'city_id' => 4,
        ],
        [
            'title' => 'Предложение говядина',
            'description' => 'Описание Предложение говядина Томск',
            'order' => 1,
            'price' => 800,
            'is_active' => true,
            'user_id' => 4,
            'catalog_level_two_id' => 1,
            'measure_id' => 1,
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
