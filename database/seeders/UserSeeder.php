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
            'description' => '',
            'is_admin' => true,
            'lang_id' => 1,
            'name' => 'Админ',
            'password' => '13467928465!',
            'phone' => '71346792846',
        ],
        [
            'avatar' => '',
            'description' => 'Начинающий фермер!',
            'lang_id' => 1,
            'name' => 'Иван Иванович (образец пользователя)',
            'password' => '13467928465!',
            'phone' => '71111111111',
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
            $hashPassword = Hash::make($dataItem['password']);
            $dataItem['password'] = $hashPassword;

            DB::table('users')->insert($dataItem);
        }
    }
}
