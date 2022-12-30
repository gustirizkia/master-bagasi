<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category = DB::table('categories')->get();
        foreach ($category as $index => $item) {
            for ($i=1; $i < $item->id+7; $i++) {
                $faker = Faker::create('id_ID');
                $name = $faker->sentence($nbWords = 5, $variableNbWords = true);
                $slug = Str::slug($name, '-');

                DB::table('products')->insertGetId([
                    'name_product' => $name,
                    'slug' => $slug,
                    'description' => $faker->sentence($nbWords = 12, $variableNbWords = true),
                    'price' => $i*300,
                    'berat' => $i*2,
                    'brand_id' => DB::table('brands')->find($index+1) ? DB::table('brands')->find($index+1)->id : 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                    'categori_id' => $item->id
                ]);
            }
        }
    }
}
