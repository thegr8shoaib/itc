<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
          'coke',
          '7up',
          'mango juice',
          'sprite'
        ];

        foreach ($array as $name) {
          Product::create([
            'name'=> $name,
            'user_id'=> 1
          ]);

        }

    }
}
