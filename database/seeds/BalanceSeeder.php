<?php

use Illuminate\Database\Seeder;
use App\Balance;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Balance::create([
            'amount'=> 100000,
            'date'=> date('Y-m-d'),
            'note'=> "No Note",
            'description'=> "Starting Balance",
            'type' => 1,
            'user_id'=> 1,
            'startingBalance'=> 0,
            'closingBalance'=> 100000
        ]);
    }
}
