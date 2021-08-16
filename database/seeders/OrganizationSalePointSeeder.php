<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSalePointSeeder extends Seeder
{
    public $data = [
        [
            'organization_id' => 1,
            'sale_point_id' => 1,
        ],
        [
            'organization_id' => 2,
            'sale_point_id' => 2,
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
            DB::table('organization_sale_point')->insert($dataItem);
        }
    }
}
