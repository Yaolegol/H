<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellerSeeder extends Seeder
{
    public $data = [
        [
            'image' => 'https://picsum.photos/200/300',
            'name' => 'ИП 1',
            'order' => 1,
            'region_id' => 4,
            'user_id' => 1
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'name' => 'ИП 2',
            'order' => 1,
            'region_id' => 5,
            'user_id' => 2
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'name' => 'ИП 3',
            'order' => 1,
            'region_id' => 3,
            'user_id' => 3
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'name' => 'ИП 4',
            'order' => 1,
            'region_id' => 2,
            'user_id' => 4
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
            DB::table('seller')->insert($dataItem);
        }
    }
}
