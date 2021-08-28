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
            CatalogLevel1Seeder::class,
            CatalogLevel2Seeder::class,
            MeasureSeeder::class,
            OfferSeeder::class,
            OrganizationSeeder::class,
            SalePointSeeder::class,
        ]);
    }
}
