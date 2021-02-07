<?php

use Illuminate\Database\Seeder;
use App\Purchase;
use App\Product;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product = Product::all();
        $product->map(function ($obj) {

          $basePrice = rand(100,10000);
          $additional = rand(100,1000);
          $quantity = rand(10,5000);
          $obj->stockAvailable = $obj->stockAvailable  + $quantity ;
          $obj->salePrice =  $basePrice + $additional;
          $obj->save();
          Purchase::create([
            'productId'=> $obj->id,
            'quantity'=> $quantity,
            'purchasePrice'=> $basePrice,
            'salePrice'=> $basePrice + $additional,
            'manufacturingDate'=> date('Y-m-d'),
            'expireDate'=> date('Y-m-d', strtotime('+1 Month')),
            'user_id'=> 1
          ]);

      });

    }
}
