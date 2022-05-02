<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeasureSeeder extends Seeder
{
    public $data = [
        [
            'title' => 'килограмм'
        ],
        [
            'title' => 'литр'
        ],
        [
            'title' => 'штука'
        ],
        [
            'title' => 'другое'
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
            DB::table('measure')->insert($dataItem);
        }
    }
}
