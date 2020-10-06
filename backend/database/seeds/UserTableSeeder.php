<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        User::create([
            'name' => 'test1',
            'email' => 'test1@yahoo.co.jp',
            'password' => Hash::make('test1test1'),

        ]);
    }
}
