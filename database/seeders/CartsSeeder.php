<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts = [
            ['products_id' => 1, 'qty' => 1,],
            ['products_id' => 2, 'qty' => 1,],
            ['products_id' => 3, 'qty' => 1,]
        ];
        DB::table('carts')->insert($carts);
    }
}
