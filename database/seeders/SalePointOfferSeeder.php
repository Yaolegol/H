<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalePointOfferSeeder extends Seeder
{
    public $data = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $dataItem) {
            DB::table('sale_point_offer')->insert($dataItem);
        }
    }
}
