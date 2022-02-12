<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public $data = [
        [
            'link' => 'city_tomsk',
            'region_id' => 1,
            'title' => 'Томск',
        ],
        [
            'link' => 'city_asino',
            'region_id' => 1,
            'title' => 'Асино',
        ],
        [
            'link' => 'city_strezhevoy',
            'region_id' => 1,
            'title' => 'Стрежевой',
        ],
        [
            'link' => 'city_novosibirsk',
            'region_id' => 2,
            'title' => 'Новосибирск',
        ],
        [
            'link' => 'city_berdsk',
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
