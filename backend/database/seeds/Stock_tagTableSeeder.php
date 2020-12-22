<?php

use Illuminate\Database\Seeder;
use App\Models\StockTag;

class Stock_tagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stock_tag')->truncate();



        DB::table('stock_tag')->insert([
            'stock_id' => 1,
            'tag_id' => 1
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 1,
            'tag_id' => 6
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 2,
            'tag_id' => 1
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 2,
            'tag_id' => 9
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 2,
            'tag_id' => 10
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 1,
            'tag_id' => 4
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 3,
            'tag_id' => 1
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 3,
            'tag_id' => 4
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 3,
            'tag_id' => 9
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 4,
            'tag_id' => 4
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 4,
            'tag_id' => 6
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 5,
            'tag_id' => 6
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 6,
            'tag_id' => 6
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 6,
            'tag_id' => 10
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 7,
            'tag_id' => 2
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 7,
            'tag_id' => 6
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 7,
            'tag_id' => 10
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 8,
            'tag_id' => 6
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 8,
            'tag_id' => 10
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 9,
            'tag_id' => 2
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 9,
            'tag_id' => 4
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 10,
            'tag_id' => 8
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 11,
            'tag_id' => 4
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 11,
            'tag_id' => 11
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 12,
            'tag_id' => 3
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 12,
            'tag_id' => 7
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 13,
            'tag_id' => 6
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 14,
            'tag_id' => 1
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 14,
            'tag_id' => 5
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 15,
            'tag_id' => 1
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 15,
            'tag_id' => 5
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 16,
            'tag_id' => 4
        ]);
        DB::table('stock_tag')->insert([
            'stock_id' => 16,
            'tag_id' => 11
        ]);
    }
}
