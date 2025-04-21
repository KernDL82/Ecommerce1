<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PointsDiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('points_discounts')->insert([
            [
                'points_needed' => 100,
                'discount_percent' => 10,
                'stripe_discount_id' => 'nGRL73Z8',
                'created_at' => Carbon::now(),
            ],
            [
                'points_needed' => 200,
                'discount_percent' => 20,
                'stripe_discount_id' => 'vy2kcvpQ',
                'created_at' => Carbon::now(),
            ], [
                'points_needed' => 300,
                'discount_percent' => 25,
                'stripe_discount_id' => 'UwmTqch4',
                'created_at' => Carbon::now(),
            ], [
                'points_needed' => 400,
                'discount_percent' => 30,
                'stripe_discount_id' => 'IEpVVC9L',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
