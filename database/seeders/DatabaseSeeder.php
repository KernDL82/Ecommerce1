<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GroupSeeder::class,
            UserSeeder::class,
            AddressSeeder::class,
            ShippingSeeder::class,
            PointsDiscountSeeder::class,
            PointsSeeder::class,
            AppSeeder::class,
        ]);
    }
}
