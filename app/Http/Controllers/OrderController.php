<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\OrderItem;
use Auth;
use App\Saleman;

class OrderController extends Controller
{
  public function saveInvoiceAndPrint(Request $request)
  {
    $salemanId = $request->saleman;

    $saleman = Saleman::find($salemanId);

    $selectedProducts = $request->selectedProducts;
    $selectedProducts = json_decode($selectedProducts);
    $date = $request->date;

    $order = Order::create([
      'user_id' => Auth::id(),
      'saleman_id' => $saleman->id,
      'date' => $date
    ]);




    foreach ($selectedProducts as $slectedProduct) {
      $product = Product::find($slectedProduct->id);
      if ($slectedProduct->cartQuantity > $product->stockAvailable) {
        return json(0, "$product->name stock quantity is Low,  available " . $product->stockAvailable);
      }
      $product->stockAvailable =  $product->stockAvailable - $slectedProduct->cartQuantity;
      $product->save();
      OrderItem::create([
        'product_id' => $product->id,
        'name' => $product->name,
        'salePrice' => $product->salePrice,
        'quantity' => $slectedProduct->cartQuantity,
        'order_id' => $order->id
      ]);
    }

    return json(1,'success',[
      'orderId'=> $order->id
    ]);
  }
  public function return(Request $request, $orderItemId)
  {
    $quantity = $request->quantity;
    // dd($quantity);

    $orderItem = OrderItem::find($orderItemId);
    $orderItem->quantity = $orderItem->quantity - $quantity;
    $orderItem->save();

    return status('item updated');

  }

  public function generateInvoice(Request $request, $orderId)
  {
    $order = Order::with('saleman')->with('orderItems')->where('id',$orderId)->first();

    $invoice = view('invoice.orderInvoice',[
      'order'=> $order
    ]);

    return $invoice;

  }
}
