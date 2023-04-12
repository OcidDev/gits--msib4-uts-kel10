<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            ['invoice' => 1, 'users_id' => 1, 'total' => 10000],
            ['invoice' => 2, 'users_id' => 1, 'total' => 10000],
            ['invoice' => 3, 'users_id' => 1, 'total' => 10000]
        ];
        DB::table('transactions')->insert($transactions);
    }
}
