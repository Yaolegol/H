<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    public $data = [
        [
            'title' => 'Test organization title 1',
            'inn' => '12345678',
            'legal_address' => 'test legal address 1',
            'real_address' => 'test real address 1',
            'email' => 'test_organization_1@yandex.ru',
            'phone' => '+71111111111',
            'user_id' => '1',
        ],
        [
            'title' => 'Test organization title 2',
            'inn' => '12345678',
            'legal_address' => 'test legal address 2',
            'real_address' => 'test real address 2',
            'email' => 'test_organization_2@yandex.ru',
            'phone' => '+72222222222',
            'user_id' => '2',
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
            DB::table('organization')->insert($dataItem);
        }
    }
}
