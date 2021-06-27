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
            CatalogFirstLevelSeeder::class,
            CatalogSecondLevelSeeder::class,
            SellerSeeder::class,
            MeasureSeeder::class,
            PriceSeeder::class,
            ProductSeeder::class,
            SellerProductSeeder::class,
            ProductPriceSeeder::class,
        ]);
    }
}
