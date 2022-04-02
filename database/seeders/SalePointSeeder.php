<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalePointSeeder extends Seeder
{
    public $data = [
        [
            'address' => 'address Sale Point 1',
            'contact_person' => 'Иван',
            'map_marker_lat' => '56.507374',
            'map_marker_lng' => '84.939882',
            'phone' => '+71111111111',
            'photo_1' => 'public/users/1/sale-point/1/photo/1.jpg',
            'photo_2' => 'public/users/1/sale-point/1/photo/2.jpg',
            'title' => 'Sale Point 1',
            'user_id' => '1',
            'working_hours' => '9-18',
        ],
        [
            'address' => 'address Sale Point 2',
            'contact_person' => 'Другой Иван',
            'map_marker_lat' => '56.479514',
            'map_marker_lng' => '84.957048',
            'phone' => '+72222222222',
            'photo_1' => 'public/users/1/sale-point/2/photo/1.jpg',
            'title' => 'Sale Point 2',
            'user_id' => '1',
            'working_hours' => '9-17',
        ],
        [
            'address' => 'address Sale Point 3',
            'contact_person' => 'Иван Иванович',
            'map_marker_lat' => '56.489372',
            'map_marker_lng' => '84.924089',
            'phone' => '+73333333333',
            'title' => 'Sale Point 3',
            'user_id' => '2',
            'working_hours' => '9-16',
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
            DB::table('sale_point')->insert($dataItem);
        }
    }
}
