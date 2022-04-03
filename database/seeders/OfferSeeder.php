<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    public $data = [
        [
            'address' => 'адрес Предложение №1 Говядина Томск',
            'city_id' => 1,
            'catalog_level_two_id' => 1,
            'country_id' => 1,
            'description' => 'Описание Предложение №1 Говядина Томск',
            'is_active' => true,
            'map_marker_lat' => '56.507574',
            'map_marker_lng' => '84.939882',
            'measure_id' => 1,
            'order' => 1,
            'organization_id' => 1,
            'phone' => '+7 111 111 11 11',
            'photo_1' => 'public/users/1/offer/1/photo/1.jpg',
            'photo_2' => 'public/users/1/offer/1/photo/2.jpg',
            'photo_3' => 'public/users/1/offer/1/photo/3.jpg',
            'price' => 100,
            'region_id' => 1,
            'title' => 'Предложение №1 Говядина Томск',
            'user_id' => 1,
        ],
        [
            'address' => 'адрес Предложение №2 Молоко ТО',
            'catalog_level_two_id' => 3,
            'country_id' => 1,
            'description' => 'Описание Предложение №2 Молоко ТО',
            'is_active' => true,
            'map_marker_lat' => '56.507574',
            'map_marker_lng' => '84.939582',
            'measure_id' => 1,
            'order' => 1,
            'organization_id' => 2,
            'phone' => '+7 111 111 11 12',
            'photo_1' => 'public/users/1/offer/2/photo/1.jpg',
            'price' => 200,
            'region_id' => 1,
            'title' => 'Предложение №2 Молоко ТО',
            'user_id' => 1,
        ],
        [
            'address' => 'адрес Предложение Говядина №3 Томск',
            'description' => 'Описание Предложение №3 Говядина Томск',
            'catalog_level_two_id' => 1,
            'city_id' => 1,
            'country_id' => 1,
            'is_active' => true,
            'measure_id' => 1,
            'order' => 1,
            'organization_id' => 3,
            'phone' => '+7 111 111 11 11',
            'photo_1' => 'public/users/2/offer/1/photo/1.jpg',
            'price' => 100,
            'region_id' => 1,
            'title' => 'Предложение №3 Говядина Томск',
            'user_id' => 2,
        ],
        [
            'address' => 'адрес Предложение №4 Курица Новосибирск',
            'catalog_level_two_id' => 2,
            'city_id' => 4,
            'country_id' => 1,
            'description' => 'Описание Предложение №4 Курица Новосибирск',
            'is_active' => true,
            'map_marker_lat' => '56.507574',
            'map_marker_lng' => '84.939182',
            'measure_id' => 1,
            'order' => 1,
            'phone' => '+7 111 111 11 11',
            'photo_1' => 'public/users/2/offer/2/photo/1.jpg',
            'photo_2' => 'public/users/2/offer/2/photo/2.jpg',
            'price' => 100,
            'region_id' => 2,
            'title' => 'Предложение №4 Курица Новосибирск',
            'user_id' => 2,
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
