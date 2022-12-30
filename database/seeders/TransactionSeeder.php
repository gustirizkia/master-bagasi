<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 20; $i++) {
            $no_inv = "INV/".time();
            $user = User::inRandomOrder()->first()->id;

            $transaction = DB::table('transactions')->insertGetId([
                'status' => 'done',
                'no_inv' => $no_inv,
                'user_id' => $user,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            for ($j=1; $j < 6; $j++) {
                $product = Product::inRandomOrder()->first();
                DB::table('detail_transactions')->insert([
                    'transaction_id' => $transaction,
                    'product_id'=> $product->id,
                    'qty' => $j,
                    'current_price' => $product->price,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }

        }
    }
}
