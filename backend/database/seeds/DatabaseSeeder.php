<?php

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
        $this->call([
            AdminTablesSeeder::class,
            StockTableSeeder::class,
            Stock_tagTableSeeder::class,
            TagTableSeeder::class,
            UserTableSeeder::class,
        ]);
    }
}
