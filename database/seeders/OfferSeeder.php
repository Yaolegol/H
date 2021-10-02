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
            'address' => 'адрес Предложение Говядина Томск 1',
            'phone' => '+7 111 111 11 11',
            'price' => 100,
            'photo_1' => 'https://picsum.photos/200/300',
            'photo_2' => 'https://picsum.photos/200/300',
            'photo_3' => 'https://picsum.photos/200/300',
            'order' => 1,
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
            'address' => 'адрес Предложение Говядина Томск 2',
            'phone' => '+7 111 111 11 12',
            'price' => 200,
            'photo_1' => 'https://picsum.photos/200/300',
            'is_active' => true,
            'user_id' => 1,
            'order' => 1,
            'catalog_level_two_id' => 1,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'title' => 'Предложение Говядина Новосибирск 1',
            'description' => 'Описание Предложение Говядина Новосибирск 1',
            'address' => 'адрес Предложение Говядина Новосибирск 1',
            'phone' => '+7 111 111 11 13',
            'price' => 100,
            'photo_1' => 'https://picsum.photos/200/300',
            'photo_2' => 'https://picsum.photos/200/300',
            'is_active' => true,
            'order' => 1,
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
            'address' => 'адрес Предложение молоко Томск',
            'phone' => '+7 111 111 11 14',
            'price' => 200,
            'is_active' => true,
            'user_id' => 1,
            'catalog_level_two_id' => 3,
            'order' => 1,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'title' => 'Предложение курица Новосибирск',
            'description' => 'Описание Предложение курица Новосибирск',
            'address' => 'адрес Предложение курица Новосибирск',
            'phone' => '+7 111 111 11 15',
            'price' => 300,
            'photo_1' => 'https://picsum.photos/200/300',
            'photo_2' => 'https://picsum.photos/200/300',
            'photo_3' => 'https://picsum.photos/200/300',
            'order' => 1,
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
            'address' => 'адрес Предложение кефир Новосибирск',
            'phone' => '+7 111 111 11 16',
            'price' => 400,
            'photo_1' => 'https://picsum.photos/200/300',
            'photo_2' => 'https://picsum.photos/200/300',
            'photo_3' => 'https://picsum.photos/200/300',
            'order' => 1,
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
            'address' => 'адрес Предложение говядина',
            'phone' => '+7 111 111 11 17',
            'price' => 800,
            'is_active' => true,
            'user_id' => 4,
            'catalog_level_two_id' => 1,
            'order' => 1,
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
