<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Product;
use App\Order;
use App\OrderItem;
use Carbon\Carbon;
use App\Expence;

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

      $arr['shortItems'] = Product::where("stockavailable", 0)->count();

      $today = Carbon::now();

      $start = date('Y-m') . '-01';
      $end = date('Y-m-d');

      $arr['salesToday'] = OrderItem::whereDate('created_at',$today)->sum('quantity');
      $arr['salesThisMonth'] = OrderItem::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('quantity');
      //
      $arr['profitThisMonth'] = OrderItem::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('profit');
      $arr['profitToday'] = OrderItem::whereDate('created_at',$today)->sum('profit');

      $arr['expenceThisMonth'] = Expence::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->sum('amount');


      return view('dashboard.home', $arr);

    }
}
