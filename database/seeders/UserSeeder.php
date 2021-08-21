<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public $data = [
        [
            'registration_email' => 'test@test.com',
            'lang_id' => 1,
            'name' => 'Test',
            'password' => 'dynamic value',
        ],
        [
            'registration_email' => 'user1@yandex.ru',
            'is_admin' => true,
            'name' => 'User name 1',
            'lang_id' => 1,
            'password' => '1234561',
            'city_id' => 1,
        ],
        [
            'registration_email' => 'user2@yandex.ru',
            'lang_id' => 1,
            'name' => 'User name 2',
            'password' => '1234562',
            'city_id' => 2,
        ],
        [
            'registration_email' => 'user3@yandex.ru',
            'name' => 'User name 3',
            'password' => '1234563',
        ],
        [
            'registration_email' => 'user4@yandex.ru',
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
            $adminUserPassword = Hash::make('123123');

            if($dataItem['registration_email'] === 'test@test.com') {
                $dataItem['password'] = $adminUserPassword;
            }

            DB::table('users')->insert($dataItem);
        }
    }
}
