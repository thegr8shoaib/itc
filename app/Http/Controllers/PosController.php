<?php

namespace App\Http\Controllers;
use App\Saleman;
use App\Pos;
use App\Product;
use Illuminate\Http\Request;
use App\Order;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      $orders = Order::query();
      $s = $request->s;
      if ($s != null) {
        $orders = $orders->where('saleman_id', $request->s);
      }



      $orders = $orders->orderBy('id','desc')->paginate();

      $salemans = Saleman::all();

      $array['salemans'] = $salemans;
      $array['orders'] = $orders;
      $array['s'] = $s;

      return view('dashboard.pos.index', $array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salemans  = Saleman::all();
        $products  = Product::all();


        return view("dashboard.pos.add" , compact('products', 'salemans'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $pos = Product::find($request->saleMan);

      $data = $request->validate([


        'productId'=> 'required|string|max:255',
        'saleMan_id'=> 'required|string|max:255',
        'quantity'=> 'required|string|max:255',
        'purchasePrice'=> 'required|numeric|min:0|max:900000',
        'salePrice'=> 'required|numeric|min:0|max:900000',
        'manufacturingDate'=> 'required|string|min:0|max:900000',
        'expireDate'=> 'required|string|min:1|max:900000'

      ]);


      $data['user_id'] = \Auth::id();

      pos::create($data);


      return statusTo("Invoice Created Successfully ", route('pos.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function show(Pos $pos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function edit(Pos $pos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pos $pos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pos  $pos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pos $pos)
    {
        //
    }
}
