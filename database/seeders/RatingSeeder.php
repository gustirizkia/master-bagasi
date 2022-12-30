<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = DB::table('products')->get();
        foreach ($products as $key => $value) {
            for ($i=1; $i < 7; $i++) {
                DB::table('ratings')->insertGetId([
                    'user_id' => $i,
                    'product_id' => $value->id,
                    'count_star' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

        }
    }
}
