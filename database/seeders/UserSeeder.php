<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public $data = [
        [
            'email' => 'user1@yandex.ru',
            'is_admin' => true,
            'name' => 'User name 1',
            'lang_id' => 1,
            'password' => '1234561',
            'region_id' => 4,
        ],
        [
            'email' => 'user2@yandex.ru',
            'lang_id' => 1,
            'name' => 'User name 2',
            'password' => '1234562',
            'region_id' => 5,
        ],
        [
            'email' => 'user3@yandex.ru',
            'name' => 'User name 3',
            'password' => '1234563',
        ],
        [
            'email' => 'user4@yandex.ru',
            'lang_id' => 2,
            'name' => 'User name 4',
            'password' => '1234564',
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
            DB::table('users')->insert($dataItem);
        }
    }
}
