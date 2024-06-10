<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            ['user_id' => 6, 'orderInfo' => 'Order 1'],
            ['user_id' => 6, 'orderInfo' => 'Order 2'],
            ['user_id' => 8, 'orderInfo' => 'Order 3'],
            ['user_id' => 9, 'orderInfo' => 'Order 4'],
            ['user_id' => 10, 'orderInfo' => 'Order 5'],
            ['user_id' => 11, 'orderInfo' => 'Order 6'],
            ['user_id' => 11, 'orderInfo' => 'Order 7'],
            ['user_id' => 10, 'orderInfo' => 'Order 8'],
            ['user_id' => 9, 'orderInfo' => 'Order 9'],
            ['user_id' => 6, 'orderInfo' => 'Order 10'],
        ]);
    }
}
