<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    public $data = [
        [
            'title' => 'Предложение №1 Говядина Томск',
            'description' => 'Описание Предложение №1 Говядина Томск',
            'address' => 'адрес Предложение №1 Говядина Томск',
            'phone' => '+7 111 111 11 11',
            'price' => 100,
            'photo_1' => 'public/users/1/offer/1/photo/1.jpg',
            'photo_2' => 'public/users/1/offer/1/photo/2.jpg',
            'photo_3' => 'public/users/1/offer/1/photo/3.jpg',
            'order' => 1,
            'is_active' => true,
            'user_id' => 1,
            'catalog_level_two_id' => 1,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'title' => 'Предложение №2 Молоко ТО',
            'description' => 'Описание Предложение №2 Молоко ТО',
            'address' => 'адрес Предложение №2 Молоко ТО',
            'phone' => '+7 111 111 11 12',
            'price' => 200,
            'photo_1' => 'public/users/1/offer/2/photo/1.jpg',
            'is_active' => true,
            'user_id' => 1,
            'order' => 1,
            'catalog_level_two_id' => 3,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 1,
        ],
        [
            'title' => 'Предложение №3 Говядина Томск',
            'description' => 'Описание Предложение №3 Говядина Томск',
            'address' => 'адрес Предложение Говядина №3 Томск',
            'phone' => '+7 111 111 11 11',
            'price' => 100,
            'photo_1' => 'public/users/2/offer/1/photo/1.jpg',
            'order' => 1,
            'is_active' => true,
            'user_id' => 2,
            'catalog_level_two_id' => 1,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 1,
            'city_id' => 1,
        ],
        [
            'title' => 'Предложение №4 Курица Новосибирск',
            'description' => 'Описание Предложение №4 Курица Новосибирск',
            'address' => 'адрес Предложение №4 Курица Новосибирск',
            'phone' => '+7 111 111 11 11',
            'price' => 100,
            'photo_1' => 'public/users/2/offer/2/photo/1.jpg',
            'photo_2' => 'public/users/2/offer/2/photo/2.jpg',
            'order' => 1,
            'is_active' => true,
            'user_id' => 2,
            'catalog_level_two_id' => 2,
            'measure_id' => 1,
            'country_id' => 1,
            'region_id' => 2,
            'city_id' => 2,
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
