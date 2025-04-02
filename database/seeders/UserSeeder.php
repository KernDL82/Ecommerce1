<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@mail.com',
                'role' => 'admin',
                'email_verified_at' => Carbon::now(),
                'password' => Hash::make('Password1'),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
            [
                'name' => 'Jane Doe',
                'email' => 'janedoe@mail.com',
                'role' => 'user',
                'password' => Hash::make('Password1'),
                'email_verified_at' => Carbon::now(),
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ],
        ]);
    }
}
