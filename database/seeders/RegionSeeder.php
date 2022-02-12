<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    public $data = [
        [
            'country_id' => 1,
            'link' => 'region_tomsk',
            'title' => 'Томская область',
        ],
        [
            'country_id' => 1,
            'link' => 'region_novosibirsk',
            'title' => 'Новосибирская область',
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
