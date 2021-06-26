<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BuyerSeeder extends Seeder
{
    public $data = [
        [
            'image' => 'https://picsum.photos/200/300',
            'link' => 'beef',
            'name' => 'ИП 2',
            'order' => 1,
            'user_id' => 1
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'link' => 'chicken',
            'name' => 'ИП 2',
            'order' => 1,
            'user_id' => 2
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'link' => 'milk',
            'name' => 'ИП 3',
            'order' => 1,
            'user_id' => 3
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'link' => 'kefir',
            'name' => 'ИП 4',
            'order' => 1,
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
            DB::table('buyer')->insert($dataItem);
        }
    }
}
