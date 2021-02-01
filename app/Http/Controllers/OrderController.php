<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;

class OrderController extends Controller
{
    public function saveInvoiceAndPrint(Request $request)
    {
      $saleman = $request->saleman;
      $selectedProducts = $request->selectedProducts;
      $selectedProducts = json_decode($selectedProducts);
      $date = $request->date;


      foreach ($selectedProducts as $product) {

      }

      dd(
        $selectedProducts,
        $saleman,
        $date
      );

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
