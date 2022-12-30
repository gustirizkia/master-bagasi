<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
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
                DB::table('product_images')->insertGetId([
                    'product_id' => $value->id,
                    'image' => "https://dummyimage.com/600x400/ffd000/002fff.jpg&text=$i-$value->name_product",
                    'created_at' => now(),
                    'updated_at' => now(),
                    'is_thumbnail' => $thumbnail ? '1' : null
                ]);

                $thumbnail = false;
            }

        }
    }
}
