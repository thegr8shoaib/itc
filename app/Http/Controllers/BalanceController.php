<?php

namespace App\Http\Controllers;

use App\Balance;
use Illuminate\Http\Request;
use Auth;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['balances'] = Balance::orderBy('created_at')->paginate(50);

        return view('dashboard.balance.index',$arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.balance.add');
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
          'amount'=> 'required|numeric',
          'date'=> 'required',
          'note'=> 'string|nullable',
          'description'=> 'required|string',
        ]);
        $balance = Balance::orderBy('id','desc')->first();
        if ($balance) {
          $startingBalance = $balance->closingBalance;
          $closingBalance = $balance->closingBalance + $request->amount;
        }else {
          $startingBalance = 0;
          $closingBalance = $request->amount;
        }



        $data['type'] = 1;
        $data['user_id'] = Auth::id();

        $data['startingBalance'] = $startingBalance;
        $data['closingBalance'] = $closingBalance;

        Balance::create($data);
        return statusTo('Operation Complete', route('balance.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        return view('dashboard.balance.edit', compact('balance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
      $balance->update($request->only(['note','description','date']));
      return statusTo('Operation Complete', route('balance.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        //
    }
}
