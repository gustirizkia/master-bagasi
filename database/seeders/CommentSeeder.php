<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = DB::table('discussions')->get();

        foreach ($product as $index => $value) {
            $thumbnail = true;

            for ($i=1; $i < 3; $i++) {
                $faker = Faker::create('id_ID');

                DB::table('comments')->insertGetId([
                    'user_id' => $i,
                    'discussion_id' => $value->id,
                    'body' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $thumbnail = false;
            }

        }
    }
}
