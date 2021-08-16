<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalePointSeeder extends Seeder
{
    public $data = [
        [
            'title' => 'Organization 1 Sale Point 1',
            'address' => 'address organization 1 Sale Point 1',
            'working_hours' => '9-18',
            'contact_person' => 'Иван',
            'phone' => '+71231231111',
            'organization_id' => '1',
        ],
        [
            'title' => 'Organization 2 Sale Point 1',
            'address' => 'address organization 2 Sale Point 1',
            'working_hours' => '9-17',
            'contact_person' => 'Иван Дурак',
            'phone' => '+71231232222',
            'organization_id' => '2',
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
