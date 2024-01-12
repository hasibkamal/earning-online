<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'user_type' => '1x101',
            'name' => 'System Admin',
            'email' => 'admin@system.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d','H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d','H:i:s'),
            'updated_by' => 1
        ]);

        DB::table('users')->insert([
            'user_type' => '2x202',
            'name' => 'User',
            'email' => 'user@system.com',
            'password' => bcrypt('123456'),
            'status' => 1,
            'created_at' => Carbon::now()->format('Y-m-d','H:i:s'),
            'created_by' => 1,
            'updated_at' => Carbon::now()->format('Y-m-d','H:i:s'),
            'updated_by' => 1
        ]);
    }
}
