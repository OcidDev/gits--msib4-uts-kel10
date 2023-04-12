<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['categories_id' => 1, 'name' => 'Product 1', 'description' => 'Description 1', 'price' => 5000],
            ['categories_id' => 1, 'name' => 'Product 2', 'description' => 'Description 2', 'price' => 5000],
            ['categories_id' => 1, 'name' => 'Product 3', 'description' => 'Description 3', 'price' => 5000]
        ];
        DB::table('products')->insert($products);
    }
}
