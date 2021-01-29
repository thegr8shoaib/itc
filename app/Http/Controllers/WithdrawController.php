<?php

namespace App\Http\Controllers;

use App\Withdraw;
use Illuminate\Http\Request;
use Auth;
use App\Profile;
use App\User;

class WithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('SuperAdminOnly', [
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
            $array['withdraws'] = Withdraw::orderBy('status', 'asc')->orderBy('id', 'desc')->paginate(20);
        } else {
            $array['withdraws'] = Withdraw::where('user_id', Auth::id())->orderBy('status', 'desc')->paginate(20);
        }

        return view('dashboard.withdraw.index', $array);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.withdraw.add');
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
          'amount'=> 'required|numeric|max:900000',
          'accountNumber'=> 'required|string|max:255',
          'accountTitle' => 'nullable|string|max:255'
        ]);


        $user = Auth::user();
        if ($user->latestMembership == null) {
          return error("You have not subscribed.");
        }

        if ($user->membership == null) {
          $plan = $user->latestMembership->plan;
        }else {
          $plan = $user->membership->plan;
        }


        if ($request->amount > $user->balance) {
            return error('You do not have sufficient balance to perform this request');
        }
        if ($request->amount < $plan->minimumWithdraw) {
          return error("In " . $plan->name ." you can not withdraw less than " . $plan->minimumWithdraw);
        }
        $data['user_id'] = Auth::id();
        Withdraw::create($data);

        newNoti(1, "New withdraw request", "We have a new withdraw request from ". Auth::user()->name, route('withdraws.index'), 0);
        return statusTo("Withdraw request received, we will add balance to account after verification completed", route('withdraws.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {
        $array = [
        'withdraw'=> $withdraw
      ];

        return view('dashboard.withdraw.edit', $array);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdraw $withdraw)
    {
        $request->validate([
        'status'=> 'required|numeric'
      ]);
        newNoti(1, "Withdraw Status Update", "Withdraw request status has been changed.", route('withdraws.index'), $withdraw->user_id);
        $withdraw->status = $request->status;

        if ($request->status == 2) {
            $profile = User::where('id', $withdraw->user_id)->first();

            User::where('id', $withdraw->user_id)->update([
          'balance'=> $profile->balance - $withdraw->amount
        ]);
        }

        $withdraw->save();
        return statusTo("Withdraw status updated successfully", route('withdraws.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdraw $withdraw)
    {
        $withdraw->delete();
        return statusTo("Withdraw request deleted successfully", route('withdraws.index'));
    }
}
