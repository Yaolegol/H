<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    public $data = [
        [
            'certificate_1' => 'public/users/1/organization/1/certificate/1.jpg',
            'description' => 'Organization 1 description',
            'email' => 'organization_1@yandex.ru',
            'inn' => '11111111',
            'legal_address' => 'Organization 1 legal address',
            'phone' => '+71111111111',
            'photo_1' => 'public/users/1/organization/1/photo/1.jpg',
            'real_address' => 'Organization 1 real address',
            'title' => 'Organization 1 title',
            'user_id' => '1',
        ],
        [
            'description' => 'Organization 2 description',
            'email' => 'organization_2@yandex.ru',
            'inn' => '22222222',
            'legal_address' => 'Organization 2 legal address',
            'phone' => '+72222222222',
            'photo_1' => 'public/users/1/organization/2/photo/1.jpg',
            'real_address' => 'Organization 2 real address',
            'title' => 'Organization 2 title',
            'user_id' => '1',
        ],
        [
            'certificate_1' => 'public/users/2/organization/1/certificate/1.jpg',
            'email' => 'organization_3@yandex.ru',
            'inn' => '33333333',
            'legal_address' => 'Organization 3 legal address',
            'phone' => '+73333333333',
            'real_address' => 'Organization 3 real address',
            'title' => 'Organization 3 title',
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
