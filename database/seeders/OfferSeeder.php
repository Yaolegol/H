<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    public $data = [
        [
            'address' => 'адрес Предложение №1 Говядина',
            'city_id' => 1,
            'catalog_level_one_id' => 1,
            'catalog_level_two_id' => 1,
            'country_id' => 1,
            'description' => 'Описание Предложение №1 Говядина',
            'is_active' => true,
            'is_approved' => 1,
            'map_marker_lat' => '50.507574',
            'map_marker_lng' => '80.939882',
            'measure_id' => 1,
            'order' => 1,
            'organization_id' => 1,
            'phone' => '+7 111 111 11 11',
            'photo_1' => 'public/users/1/offer/1/photo/1.jpg',
            'photo_2' => 'public/users/1/offer/1/photo/2.jpg',
            'photo_3' => 'public/users/1/offer/1/photo/3.jpg',
            'price' => 100,
            'price_description' => 'test price_description 100',
            'region_id' => 1,
            'title' => 'Предложение №1 Говядина',
            'user_id' => 1,
        ],
        [
            'address' => 'адрес Предложение №2 Говядина',
            'city_id' => 1,
            'catalog_level_one_id' => 1,
            'catalog_level_two_id' => 1,
            'country_id' => 1,
            'description' => 'Описание Предложение №2 Говядина',
            'is_active' => true,
            'is_approved' => 1,
            'map_marker_lat' => '55.507574',
            'map_marker_lng' => '85.939882',
            'measure_id' => 1,
            'order' => 1,
            'organization_id' => 1,
            'phone' => '+7 111 111 11 11',
            'photo_1' => 'public/users/1/offer/1/photo/1.jpg',
            'photo_2' => 'public/users/1/offer/1/photo/2.jpg',
            'photo_3' => 'public/users/1/offer/1/photo/3.jpg',
            'price' => 100,
            'price_description' => 'test price_description 100',
            'region_id' => 1,
            'title' => 'Предложение №2 Говядина',
            'user_id' => 1,
        ],
        [
            'address' => 'адрес Предложение №3 Курица',
            'city_id' => 1,
            'catalog_level_one_id' => 1,
            'catalog_level_two_id' => 2,
            'country_id' => 1,
            'description' => 'Описание Предложение №3 Курица',
            'is_active' => true,
            'is_approved' => 1,
            'map_marker_lat' => '40.507574',
            'map_marker_lng' => '40.939882',
            'measure_id' => 1,
            'order' => 1,
            'organization_id' => 1,
            'phone' => '+7 111 111 11 11',
            'photo_1' => 'public/users/1/offer/1/photo/1.jpg',
            'photo_2' => 'public/users/1/offer/1/photo/2.jpg',
            'photo_3' => 'public/users/1/offer/1/photo/3.jpg',
            'price' => 100,
            'price_description' => 'test price_description 100',
            'region_id' => 1,
            'title' => 'Предложение №3 Курица',
            'user_id' => 1,
        ],
        [
            'address' => 'адрес Предложение №4 Курица',
            'city_id' => 1,
            'catalog_level_one_id' => 1,
            'catalog_level_two_id' => 2,
            'country_id' => 1,
            'description' => 'Описание Предложение №4 Курица',
            'is_active' => true,
            'is_approved' => 1,
            'map_marker_lat' => '40.607574',
            'map_marker_lng' => '40.139882',
            'measure_id' => 1,
            'order' => 1,
            'organization_id' => 1,
            'phone' => '+7 111 111 11 11',
            'photo_1' => 'public/users/1/offer/1/photo/1.jpg',
            'photo_2' => 'public/users/1/offer/1/photo/2.jpg',
            'photo_3' => 'public/users/1/offer/1/photo/3.jpg',
            'price' => 100,
            'price_description' => 'test price_description 100',
            'region_id' => 1,
            'title' => 'Предложение №4 Курица',
            'user_id' => 1,
        ],
        [
            'address' => 'адрес Предложение №5 Кефир',
            'city_id' => 1,
            'catalog_level_one_id' => 2,
            'catalog_level_two_id' => 5,
            'country_id' => 1,
            'description' => 'Описание Предложение №5 Кефир',
            'is_active' => true,
            'is_approved' => 1,
            'map_marker_lat' => '54.507574',
            'map_marker_lng' => '84.939882',
            'measure_id' => 1,
            'order' => 1,
            'organization_id' => 1,
            'phone' => '+7 111 111 11 11',
            'photo_1' => 'public/users/1/offer/1/photo/1.jpg',
            'photo_2' => 'public/users/1/offer/1/photo/2.jpg',
            'photo_3' => 'public/users/1/offer/1/photo/3.jpg',
            'price' => 100,
            'price_description' => 'test price_description 100',
            'region_id' => 1,
            'title' => 'Предложение №5 Кефир',
            'user_id' => 1,
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
