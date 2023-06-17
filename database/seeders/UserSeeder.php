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
