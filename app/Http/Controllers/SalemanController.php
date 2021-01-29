<?php

namespace App\Http\Controllers;

use App\Saleman;
use Illuminate\Http\Request;

class SalemanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $salemans = saleman::paginate(10);

      $array['salemans'] = $salemans;

      return view('dashboard.saleman.index', $array);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.saleman.add");
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
        'designation'=> 'required|string|max:255',
        'contactNumber'=> 'required|numeric|min:0|max:900000',
        'address'=> 'required|string|min:1|max:900000'

      ]);


      $data['user_id'] = \Auth::id();
      Saleman::create($data);


      return statusTo("Saleman Added Successfully ", route('salemans.index'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Saleman  $saleman
     * @return \Illuminate\Http\Response
     */
    public function show(Saleman $saleman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Saleman  $saleman
     * @return \Illuminate\Http\Response
     */
    public function edit(Saleman $saleman)
    {
        return view("dashboard.saleman.edit" , ['saleman'=>$saleman]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Saleman  $saleman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saleman $saleman)
    {
      $data = $request->validate([
        'name'=> 'required|string|max:255',
        'designation'=> 'required|string|max:255',
        'contactNumber'=> 'required|numeric|min:1|max:900000',
        'address'=> 'required|string|min:1|max:900000'
    ]);

    $saleman->name  = $request->name;
    $saleman->designation  = $request->designation;
    $saleman->contactNumber  = $request->contactNumber;
    $saleman->address  = $request->address;
    $saleman->save();
        return statusTo("Saleman Updated Successfully" , route('salemans.index') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Saleman  $saleman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Saleman $saleman)
    {
      $saleman->delete();
      return statusTo("Saleman deleted successfully", route('salemans.index'));
    }
}
