<?php

namespace App\Http\Controllers;

use App\Deposit;
use Illuminate\Http\Request;
use Auth;
use App\Profile;
use App\User;

class DepositController extends Controller
{
      public function __construct()
      {
          $this->middleware('SuperAdminOnly',[
            'except'=> [
              'index', 'create', 'store'
            ]
          ]);
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = [];
        if (superAdmin()) {
          $array['deposits'] = Deposit::orderBy('status','asc')->orderBy('id','desc')->paginate(20);
        }else {
          $array['deposits'] = Deposit::where('user_id',Auth::id())->orderBy('status','desc')->paginate(20);
        }

        return view('dashboard.deposit.index',$array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.deposit.add');
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
          'gateway'=> 'required|string|max:255',
          'amount'=> 'required|numeric|min:1500|max:900000',
          'transectionId'=> 'required|string|max:255'
        ]);
        $data['user_id'] = Auth::id();
        Deposit::create($data);

        newNoti(1, "New deposit request", "We have a new deposit request from ". Auth::user()->name , route('deposits.index'), 0);
        return statusTo("Deposit request received, we will add balance to account after verification completed", route('deposits.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        $array = [
          'deposit'=> $deposit
        ];

        return view('dashboard.deposit.edit', $array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        $request->validate([
          'status'=> 'required|numeric'
        ]);
        newNoti(1, "Deposit Status Update", "Deposit request status has been changed." , route('deposits.index'), $deposit->user_id);
        $deposit->status = $request->status;

        if ($request->status == 2) {
          $profile = User::where('id', $deposit->user_id)->first();

          User::where('id', $deposit->user_id)->update([
            'balance'=> $profile->balance + $deposit->amount
          ]);
        }

        $deposit->save();
        return statusTo("Deposit status updated successfully", route('deposits.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
      $deposit->delete();
      return statusTo("Deposit request deleted successfully", route('deposits.index'));
    }
}
