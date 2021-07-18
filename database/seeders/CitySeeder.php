<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public $data = [
        [
            'country_id' => 1,
            'region_id' => 1,
            'title' => 'Томск',
        ],
        [
            'country_id' => 1,
            'region_id' => 1,
            'title' => 'Асино',
        ],
        [
            'country_id' => 1,
            'region_id' => 1,
            'title' => 'Стрежевой',
        ],
        [
            'country_id' => 1,
            'region_id' => 2,
            'title' => 'Новосибирск',
        ],
        [
            'country_id' => 1,
            'region_id' => 2,
            'title' => 'Бердск',
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
            DB::table('city')->insert($dataItem);
        }
    }
}
