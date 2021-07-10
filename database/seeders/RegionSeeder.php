<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    public $data = [
        [
            'level' => 'country',
            'title' => 'Россия',
        ],
        [
            'level' => 'region',
            'previous_level_id' => 1,
            'title' => 'Томская область',
        ],
        [
            'level' => 'region',
            'previous_level_id' => 1,
            'title' => 'Новосибирская область',
        ],
        [
            'level' => 'city',
            'previous_level_id' => 2,
            'title' => 'Томск',
        ],
        [
            'level' => 'city',
            'previous_level_id' => 3,
            'title' => 'Новосибирск',
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
            DB::table('region')->insert($dataItem);
        }
    }
}
