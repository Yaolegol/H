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
            UserSeeder::class,
            CatalogLevelOneSeeder::class,
            CatalogLevelTwoSeeder::class,
            MeasureSeeder::class,
            OrganizationSeeder::class,
            SalePointSeeder::class,
            OfferSeeder::class,
            SalePointOfferSeeder::class,
        ]);
    }
}
