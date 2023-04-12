<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Category 1', 'description' => 'Description 1'],
            ['name' => 'Category 2', 'description' => 'Description 2'],
            ['name' => 'Category 3', 'description' => 'Description 3']
        ];
        DB::table('categories')->insert($categories);
    }
}
