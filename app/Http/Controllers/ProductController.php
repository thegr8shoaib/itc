<?php

namespace App\Http\Controllers;
use App\Company;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        $array['products'] = $products;

        return view('dashboard.products.index', $array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $companies  = Company::all();
        return view("dashboard.products.add" , compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->validate([


        'name'=> 'required|string|max:255',
        'company'=> 'required|string|max:255',
        'unit'=> 'required|numeric|min:1|max:900000'

      ]);


      $data['user_id'] = \Auth::id();
      Product::create($data);


      return statusTo("Product Added Successfully ", route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view("dashboard.products.edit" , ['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
          'name'=> 'required|string|max:255',
          'company'=> 'required|string|max:255',
          'unit'=> 'required|numeric|min:1|max:900000'

      ]);

      $product->name  = $request->name;
      $product->company  = $request->company;
      $product->unit  = $request->unit;
      $product->save();
          return statusTo("Product Updated Successfully" , route('products.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
      return statusTo("Product deleted successfully", route('products.index'));
    }

    public function productsSearch(Request $request)
    {
      $term = $request->term;
      $products = Product::where('name','like', "$term%")->select('id', 'name as text')->orderBy('name')->get();

      return $products->toJson();
    }
}
