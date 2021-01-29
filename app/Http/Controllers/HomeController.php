<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Deposit;
use App\Withdraw;
use App\BlanceHistory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if (!superAdmin()) {
          $balanceHistory = BlanceHistory::with('video')->where('user_id', $user->id)->orderBy('id','desc')->paginate(20);
          $array = [
            'user'=> $user,
            'totalDeposit'=> Deposit::where('user_id', $user->id)->where('status',2)->sum('amount'),
            'totalWithdraw'=> Withdraw::where('user_id', $user->id)->where('status',2)->sum('amount'),
            'balanceHistory' => $balanceHistory
          ];

        }else {

          $array['users'] = User::where('role','!=',9)->orderBy('id','desc')->limit(20)->get();
          $array['userCount'] = User::where('role','!=',9)->count();
          $array['withdrawRequests'] = Withdraw::where('status',1)->count();
          $array['depositRequests'] = Deposit::where('status',1)->count();

        }

        return view('dashboard.home', $array);
    }
}
