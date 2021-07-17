<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public $data = [
        [
            'region_id' => 1,
            'title' => 'Томск',
        ],
        [
            'region_id' => 2,
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
            DB::table('city')->insert($dataItem);
        }
    }
}
