<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Admin', 'role_id' => 1, 'password' => Hash::make('password')],
            ['id' => 2, 'name' => 'Admin User 2', 'role_id' => 1, 'password' => Hash::make('password')],
            ['id' => 3, 'name' => 'lead', 'role_id' => 2, 'password' => Hash::make('password')],
            ['id' => 4, 'name' => 'Team Lead User 2', 'role_id' => 2, 'password' => Hash::make('password')],
            ['id' => 5, 'name' => 'Team Lead User 3', 'role_id' => 2, 'password' => Hash::make('password')],
            ['id' => 6, 'name' => 'buyer', 'role_id' => 3, 'password' => Hash::make('password')],
            ['id' => 7, 'name' => 'Buyer User 2', 'role_id' => 3, 'password' => Hash::make('password')],
            ['id' => 8, 'name' => 'Buyer User 3', 'role_id' => 3, 'password' => Hash::make('password')],
            ['id' => 9, 'name' => 'Buyer User 4', 'role_id' => 3, 'password' => Hash::make('password')],
            ['id' => 10, 'name' => 'Buyer User 5', 'role_id' => 3, 'password' => Hash::make('password')],
            ['id' => 11, 'name' => 'Buyer User 6', 'role_id' => 3, 'password' => Hash::make('password')],
        ]);
    }
}
