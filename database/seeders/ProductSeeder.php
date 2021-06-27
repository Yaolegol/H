<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public $data = [
        [
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '1 test product',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '2 test product',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '3 test product',
        ],
        [
            'image' => 'https://picsum.photos/200/300',
            'order' => 1,
            'title' => '4 test product',
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
            DB::table('product')->insert($dataItem);
        }
    }
}
