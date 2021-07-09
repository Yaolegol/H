<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CatalogSeeder::class,
            SellerSeeder::class,
            MeasureSeeder::class,
            ProductSeeder::class,
            SellerProductSeeder::class,
            OfferSeeder::class,
        ]);
    }
}
