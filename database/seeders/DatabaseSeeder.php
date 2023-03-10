<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(6)->create();
        $this->call([
            CategorySeeder::class,
            BrandSeeder::class,
            ProductSeeder::class,
            ProductImageSeeder::class,
            DiscussionSeeder::class,
            CommentSeeder::class,
            RatingSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
