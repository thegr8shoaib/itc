<?php

namespace App\Http\Controllers;

use App\Membership;
use Illuminate\Http\Request;
use Auth;
use App\Plan;
use App\User;
use App\Refferal;
use App\RefferAmountEarned;

class MembershipController extends Controller
{
    public function __construct()
    {
        $this->middleware('SuperAdminOnly', [
          'except'=> [
            'index', 'subscribe'
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
        if (superAdmin()) {
            $array['memberships'] = Membership::with('user')->orderBy('id', 'desc')->paginate(20);
        } else {
            $array['memberships'] = Membership::where('user_id', Auth::id())->orderBy('id', 'desc')->paginate(20);
        }
        $array['user'] = Auth::user();
        $array['userMembership'] = Auth::user()->membership;

        $array['plans'] = Plan::where('status', 1)->get();


        return view('dashboard.membership.index', $array);
    }
    public function subscribe(Request $request, Plan $plan)
    {
        $user = Auth::user();

        if ($user->balance < $plan->price) {
            $a = "<a href='" . route('deposits.create') ."'>deposit</a>";
            return error("You do not have sufficient balance. Please $a or earn and then try again.");
        }
        /*
        we have balance
        now we need to subscribe the user to this plan


        */
        $datetime = \Carbon\Carbon::now();
        $start = $datetime->toDateTimeString();
        $end = $datetime->addMonths(2)->toDateTimeString();
        if (MemberShip::where('user_id', $user->id)->where('status', 1)->count()) {
            MemberShip::where('user_id', $user->id)->where('status', 1)->update([
              'end_at'=> $start,
              'status' => 0
            ]);
        }



        $membership = MemberShip::create([
          'start_at'=> $start,
          'end_at'=> $end,
          'plan_id'=> $plan->id,
          'user_id'=> $user->id
        ]);

        User::where('id', $user->id)->update([
          'balance' => $user->balance - $plan->price,
          'plan' => $plan->id
        ]);


        if (Refferal::where('user_id',$user->id)->count()) {
          $refferal = Refferal::where('user_id',$user->id)->first();
          if (!RefferAmountEarned::where('refferal_id',$refferal->id)->count()) {
            RefferAmountEarned::create([
              'refferal_id'=> $refferal->id,
              'amount'=> $plan->price * 0.10,
              'membership_id'=> $membership->id
            ]);
            $userTemp = User::where('id',$refferal->refferer_id)->first();
            User::where('id',$refferal->refferer_id)->update([
              'balance'=> $userTemp->balance + $plan->price * 0.10
            ]);

          }
        }


        return statusTo("You have successfully subscribed to " . $plan->name, route('home'));
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
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        $membership->status = 0;

        $datetime = \Carbon\Carbon::now();
        $start = $datetime->toDateTimeString();
        $membership->end_at = $start;
        $membership->save();
        return status('Membership canceled');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
    }
}
