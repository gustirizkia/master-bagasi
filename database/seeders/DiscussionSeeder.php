<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DiscussionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = DB::table('products')->get();

        foreach ($product as $index => $value) {
            $thumbnail = true;

            for ($i=1; $i < 7; $i++) {
                $faker = Faker::create('id_ID');

                DB::table('discussions')->insertGetId([
                    'user_id' => $i,
                    'product_id' => $value->id,
                    'body' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $thumbnail = false;
            }

        }
    }
}
