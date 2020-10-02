<?php

use Illuminate\Database\Seeder;
use App\Models\Cart;

class CartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::truncate();

        Cart::create([
            'stock_id' => 1,
            'user_id' => 1
        ]);
        Cart::create([
            'stock_id' => 2,
            'user_id' => 2
        ]);
    }
}
