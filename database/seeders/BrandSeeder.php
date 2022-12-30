<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 7; $i++) {
            DB::table('brands')->insertGetId([
                'name' => "Brand $i",
                'slug' => "Brand-$i",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
