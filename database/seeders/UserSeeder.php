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
            'name' => 'Иван',
            'password' => '',
            'phone' => '71231230000',
        ],
        [
            'description' => 'test2',
            'lang_id' => 1,
            'name' => 'Николай',
            'password' => '',
            'phone' => '71231231111',
        ],
        [
            'description' => 'test3',
            'lang_id' => 1,
            'name' => 'Александр',
            'password' => '',
            'phone' => '71231232222',
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
