<?php

use App\Balance;
use Illuminate\Database\Seeder;
use App\Purchase;
use App\Product;
use App\Repository\CommonRepository;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commonRepository = new CommonRepository;

        $product = Product::all();
        $product->map(function ($obj) {

            $basePrice = rand(10, 100);
            $additional = rand(10, 50);
            $quantity = rand(100, 500);
            $obj->stockAvailable = $obj->stockAvailable + $quantity;
            $obj->salePrice = $basePrice + $additional;
            $obj->save();


            $purchase = Purchase::create([
                'productId' => $obj->id,
                'quantity' => $quantity,
                'purchasePrice' => $basePrice,
                'salePrice' => $basePrice + $additional,
                'manufacturingDate' => date('Y-m-d'),
                'expireDate' => date('Y-m-d', strtotime('+1 Month')),
                'user_id' => 1
            ]);


            $totalBalanceRequired = $purchase->quantity * $purchase->purchasePrice;

            $balance = Balance::latest()->first();

            $balanceData = [
                'amount' => $totalBalanceRequired,
                'type' => 2,
                'closingBalance' => $balance->closingBalance - $totalBalanceRequired,
                'description' => "$purchase->quantity $obj->name Purchased",
                'date' => date('Y-m-d'),
                'purchase_Id' => $purchase->id
            ];
            Balance::create($balanceData);


        });

    }
}
