<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LeadBuyerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lead_buyer')->insert([
            ['lead_id' => 3, 'buyer_id' => 6],
            ['lead_id' => 3, 'buyer_id' => 7],
            ['lead_id' => 3, 'buyer_id' => 8],
            ['lead_id' => 4, 'buyer_id' => 9],
            ['lead_id' => 5, 'buyer_id' => 10],
            ['lead_id' => 5, 'buyer_id' => 11],
        ]);
    }
}
