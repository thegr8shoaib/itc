<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;
use App\Product;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $purchases = purchase::paginate(10);

      $array['purchases'] = $purchases;

      return view('dashboard.purchase.index', $array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view("dashboard.purchase.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $product = Product::find($request->productId);


      $product->stockAvailable = $product->stockAvailable  + $request->quantity ;
      $product->save();
      $product->salePrice =  $request->salePrice ;
      $product->save();


      $data = $request->validate([


        'productId'=> 'required|string|max:255',
        'quantity'=> 'required|string|max:255',
        'purchasePrice'=> 'required|numeric|min:0|max:900000',
        'salePrice'=> 'required|numeric|min:0|max:900000',
        'manufacturingDate'=> 'required|string|min:0|max:900000',
        'expireDate'=> 'required|string|min:1|max:900000'

      ]);


      $data['user_id'] = \Auth::id();

      Purchase::create($data);


      return statusTo("Purchase Added Successfully ", route('purchase.index'));
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        return view("dashboard.purchase.edit" , ['purchase'=>$purchase]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $data = $request->validate([


          'productId'=> 'required|string|max:255',
          'quantity'=> 'required|string|max:255',
          'purchasePrice'=> 'required|numeric|min:0|max:900000',
          'salePrice'=> 'required|numeric|min:0|max:900000',
          'manufacturingDate'=> 'required|string|min:0|max:900000',
          'expireDate'=> 'required|string|min:1|max:900000'
    ]);

    $purchase->productId  = $request->product;
    $purchase->quantity  = $request->quantity;
    $purchase->purchasePrice  = $request->purchasePrice;
    $purchase->salePrice  = $request->salePrice;
    $purchase->manufacturingDate  = $request->manufacturingDate;
    $purchase->expireDate  = $request->expireDate;
    $purchase->save();
        return statusTo("Purchase Updated Successfully" , route('purchase.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {

    $product= Product::find($purchase->productId);
    $product->stockAvailable = $product->stockAvailable  - $purchase->quantity ;
    $product->save();

      $purchase->delete();
      return statusTo("Purchase deleted successfully", route('purchase.index'));
    }
}
