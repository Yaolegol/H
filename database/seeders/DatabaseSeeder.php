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
            LangSeeder::class,
            CountrySeeder::class,
            RegionSeeder::class,
            CitySeeder::class,
            UserSeeder::class,
            CatalogSeeder::class,
            SellerSeeder::class,
            MeasureSeeder::class,
            SellerCatalogSeeder::class,
            OfferSeeder::class,
        ]);
    }
}
