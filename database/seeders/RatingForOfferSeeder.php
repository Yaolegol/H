<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingForOfferSeeder extends Seeder
{
    public $data = [
        [
            'value' => '1',
        ],
        [
            'value' => '2',
        ],
        [
            'value' => '3',
        ],
        [
            'value' => '4',
        ],
        [
            'value' => '5',
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
            DB::table('rating_for_offer')->insert($dataItem);
        }
    }
}
