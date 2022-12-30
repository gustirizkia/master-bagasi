<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 7; $i++) {
            DB::table('categories')->insertGetId([
                'name' => "Kategori $i",
                'slug' => "Kategori-$i",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
