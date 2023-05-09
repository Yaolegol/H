<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    public $data = [
        [
            'address' => 'адрес Предложение №1 Говядина',
            'catalog_level_one_id' => 1,
            'description' => 'Описание Предложение №1 Говядина',
            'is_active' => true,
            'is_approved' => 1,
            'map_marker_lat' => '50.507574',
            'map_marker_lng' => '80.939882',
            'order' => 1,
            'phone' => '+7 111 111 11 11',
            'photo_1' => 'public/users/1/offer/1/photo/1.jpg',
            'photo_2' => 'public/users/1/offer/1/photo/2.jpg',
            'photo_3' => 'public/users/1/offer/1/photo/3.jpg',
            'price' => 100,
            'price_description' => 'test price_description 100',
            'title' => 'Предложение №1 Говядина',
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
