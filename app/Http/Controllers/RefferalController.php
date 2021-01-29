<?php

namespace App\Http\Controllers;

use App\Refferal;
use Illuminate\Http\Request;
use Auth;

class RefferalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = [];
        if (superAdmin()) {
            $array['refferals'] = Refferal::orderBy('id', 'desc')->paginate(20);
        } else {
            $array['refferals'] = Refferal::where('refferer_id', Auth::id())->paginate(20);
        }

        return view('dashboard.refferal.index', $array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Refferal  $refferal
     * @return \Illuminate\Http\Response
     */
    public function show(Refferal $refferal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Refferal  $refferal
     * @return \Illuminate\Http\Response
     */
    public function edit(Refferal $refferal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Refferal  $refferal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refferal $refferal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Refferal  $refferal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refferal $refferal)
    {
        //
    }
}
