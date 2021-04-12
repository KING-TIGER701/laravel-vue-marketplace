<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Furniture'
        ]);

        DB::table('categories')->insert([
            'name' => 'Electronics'
        ]);
        DB::table('categories')->insert([
            'name' => 'Cars'
        ]);
        DB::table('categories')->insert([
            'name' => 'Property'
        ]);
    }
}
