<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use Auth;

class OrderController extends Controller
{
    public function saveInvoiceAndPrint(Request $request)
    {
      $saleman = $request->saleman;
      $selectedProducts = $request->selectedProducts;
      $selectedProducts = json_decode($selectedProducts);
      $date = $request->date;

      $order = Order::create([
        'user_id' => Auth::id(),
        'saleman_id' =>$saleman,
        'date' =>$date
      ]);


      foreach ($selectedProducts as $product) {

// dd($product);
        OrderItem::create([
          'product_id' => $product->id,
          'name' =>$product->name,
          'salePrice' =>$product->salePrice,
          'quantity' =>$product->cartQuantity,
          'order_id' => $order->id
        ]);


      }

    }
}



// $order = new Order;
// $order->user_id = Auth::id();
// $order->saleman = $saleman;
// $order->date = $date;
// $order->save();


// Order::create([
//   'user_id'=> Auth::id(),
//   'saleman'=> $saleman,
//   'date'=> $date
// ]);
