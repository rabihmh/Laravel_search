<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create(['name'=>'dell']);
        Tag::create(['name'=>'hp']);
        Tag::create(['name'=>'acer']);
        Tag::create(['name'=>'mac']);
        Tag::create(['name'=>'yeti']);
        Tag::create(['name'=>'roods']);
        Tag::create(['name'=>'lenovo']);
        Tag::create(['name'=>'sony']);
        Tag::create(['name'=>'ps4']);
        Tag::create(['name'=>'iphone']);
        Tag::create(['name'=>'nintendo']);
    }
}
