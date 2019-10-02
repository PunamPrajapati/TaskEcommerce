<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'title' => 'shoes'
        ]);
        DB::table('categories')->insert([
            'title' => 'clothes'
        ]);
        DB::table('categories')->insert([
            'title' => 'accessories'
        ]);
        DB::table('categories')->insert([
            'title' => 'toys'
        ]);
    }
}
