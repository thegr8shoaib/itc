<?php

namespace App\Http\Controllers;

use App\Expence;
use Illuminate\Http\Request;

class ExpenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $expences = Expence::paginate(10);

      $array['expences'] = $expences;

      return view('dashboard.expence.index', $array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view("dashboard.expence.add");
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
        'amount'=> 'required|numeric|max:255',
        'discription'=> 'required|string|min:0|max:900000',
        'Date'=> 'required|string',

      ]);


      $data['user_id'] = \Auth::id();
      expence::create($data);


      return statusTo("Expence Added Successfully ", route('expence.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expence  $expence
     * @return \Illuminate\Http\Response
     */
    public function show(Expence $expence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expence  $expence
     * @return \Illuminate\Http\Response
     */
    public function edit(Expence $expence)
    {
        return view("dashboard.expence.edit" , ['expence'=>$expence]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expence  $expence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expence $expence)
    {
      $data = $request->validate([
        'name'=> 'required|string|max:255',
        'amount'=> 'required|numeric|min:0|max:900000',
        'discription'=> 'required|string|min:0|max:900000',
        'Date'=> 'required|string',

    ]);

    $expence->name  = $request->name;
    $expence->amount  = $request->amount;
    $expence->discription  = $request->discription;
    $expence->Date  = $request->Date;
    $expence->save();
        return statusTo("Expence Updated Successfully" , route('expence.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expence  $expence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expence $expence)
    {
      $expence->delete();
      return statusTo("Expence deleted successfully", route('expence.index'));
    }
}
