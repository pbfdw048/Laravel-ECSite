<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();

        Tag::create([
            'name' => 'お買い得'
        ]);
        Tag::create([
            'name' => '高級品'
        ]);
        Tag::create([
            'name' => '外出用'
        ]);
        Tag::create([
            'name' => '室内用'
        ]);
        Tag::create([
            'name' => 'ドリンク'
        ]);
        Tag::create([
            'name' => '電化製品'
        ]);
        Tag::create([
            'name' => '贈答用'
        ]);
        Tag::create([
            'name' => '食料品'
        ]);
        Tag::create([
            'name' => '楽器'
        ]);
        Tag::create([
            'name' => '室外両用'
        ]);
        Tag::create([
            'name' => '珍品'
        ]);
        Tag::create([
            'name' => 'その他'
        ]);
    }
}
