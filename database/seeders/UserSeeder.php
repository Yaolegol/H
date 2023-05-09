<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public $data = [
        [
            'avatar' => '',
            'description' => 'Админ 1',
            'is_admin' => true,
            'lang_id' => 1,
            'name' => 'Админ',
            'password' => '',
            'phone' => '71111111111',
        ],
        [
            'avatar' => '',
            'description' => 'Админ 2',
            'is_admin' => true,
            'lang_id' => 1,
            'name' => 'Админ 2',
            'password' => '',
            'phone' => '72222222222',
        ],
        [
            'avatar' => '',
            'description' => 'Админ 3',
            'is_admin' => true,
            'lang_id' => 1,
            'name' => 'Админ 3',
            'password' => '',
            'phone' => '73333333333',
        ],
        [
            'avatar' => '',
            'description' => 'Админ 4',
            'is_admin' => true,
            'lang_id' => 1,
            'name' => 'Админ 4',
            'password' => '',
            'phone' => '74444444444',
        ],
        [
            'avatar' => '',
            'description' => 'Админ 5',
            'is_admin' => true,
            'lang_id' => 1,
            'name' => 'Админ 5',
            'password' => '',
            'phone' => '75555555555',
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
            $hashPassword = Hash::make('13467982465!');
            $dataItem['password'] = $hashPassword;

            DB::table('users')->insert($dataItem);
        }
    }
}
