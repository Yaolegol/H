<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    public $data = [
        [
            'measure_id' => 1,
            'price' => 100,
        ],
        [
            'measure_id' => 1,
            'price' => 200,
        ],
        [
            'measure_id' => 1,
            'price' => 300,
        ],
        [
            'measure_id' => 1,
            'price' => 400,
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
            DB::table('price')->insert($dataItem);
        }
    }
}
