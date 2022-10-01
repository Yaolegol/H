<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public $data = [
        [
            'avatar' => 'public/users/1/avatar/1_1648916228.jpg',
            'description' => 'test1',
            'is_admin' => true,
            'lang_id' => 1,
            'name' => 'test1',
            'password' => '',
            'phone' => '79069473139',
            'visible_email' => 'visible_test1@test1.com',
        ],
        [
            'description' => 'test2',
            'lang_id' => 1,
            'name' => 'test2',
            'password' => '',
            'phone' => '71231231111',
            'visible_email' => 'visible_test2@test2.com',
        ],
        [
            'description' => 'test3',
            'lang_id' => 1,
            'name' => 'test3',
            'password' => '',
            'phone' => '71231232222',
            'visible_email' => 'visible_test3@test3.com',
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
            $hashPassword = Hash::make('123123');
            $dataItem['password'] = $hashPassword;

            DB::table('users')->insert($dataItem);
        }
    }
}
