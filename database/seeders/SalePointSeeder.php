<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalePointSeeder extends Seeder
{
    public $data = [
        [
            'number' => 1,
            'title' => 'Organization 1 Sale Point 1',
            'address' => 'address organization 1 Sale Point 1',
            'working_hours' => '9-18',
            'contact_person' => 'Иван',
            'phone' => '+71231231111',
            'user_id' => '1',
        ],
        [
            'number' => 1,
            'title' => 'Organization 2 Sale Point 1',
            'address' => 'address organization 2 Sale Point 1',
            'working_hours' => '9-17',
            'contact_person' => 'Иван Дурак',
            'phone' => '+71231232222',
            'user_id' => '2',
        ],
        [
            'number' => 1,
            'title' => 'Organization 3 Sale Point 1',
            'address' => 'address organization 3 Sale Point 1',
            'working_hours' => '9-16',
            'contact_person' => 'Иван ванович',
            'phone' => '+71231233333',
            'user_id' => '3',
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
