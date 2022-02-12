<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public $data = [
        [
            'link' => 'tomsk',
            'region_id' => 1,
            'title' => 'Томск',
        ],
        [
            'link' => 'asino',
            'region_id' => 1,
            'title' => 'Асино',
        ],
        [
            'link' => 'strezhevoy',
            'region_id' => 1,
            'title' => 'Стрежевой',
        ],
        [
            'link' => 'novosibirsk',
            'region_id' => 2,
            'title' => 'Новосибирск',
        ],
        [
            'link' => 'berdsk',
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
