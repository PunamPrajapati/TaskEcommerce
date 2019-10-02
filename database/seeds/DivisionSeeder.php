<?php

use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            'name' => 'men'
        ]);
        DB::table('divisions')->insert([
            'name' => 'women'
        ]);
        DB::table('divisions')->insert([
            'name' => 'kids'
        ]);
    }
}
