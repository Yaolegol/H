<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryRegionSeeder extends Seeder
{
    public $data = [
        [
            'title' => 'Томская область'
        ],
        [
            'title' => 'Новосибирская область'
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
            DB::table('country_region')->insert($dataItem);
        }
    }
}
