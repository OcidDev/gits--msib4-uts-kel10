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
            ['categories_id' => 1, 'name' => 'Ayam Goreng', 'description' => 'Description 1', 'price' => 5000],
            ['categories_id' => 1, 'name' => 'Pisang Goreng', 'description' => 'Description 2', 'price' => 5000],
            ['categories_id' => 2, 'name' => 'Es Teh Anget', 'description' => 'Description 3', 'price' => 5000]
        ];
        DB::table('products')->insert($products);
    }
}
