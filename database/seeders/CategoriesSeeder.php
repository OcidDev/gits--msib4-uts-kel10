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
            ['name' => 'Makanan', 'description' => 'Enak mantap'],
            ['name' => 'Minuman', 'description' => 'Segere Poll'],
            ['name' => 'Makanan Ringan', 'description' => 'Enaaak']
        ];
        DB::table('categories')->insert($categories);
    }
}
