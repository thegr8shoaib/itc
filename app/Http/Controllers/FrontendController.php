<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\ContactUs;

class FrontendController extends Controller
{
  public function welcomePage()
  {
    $plans = Plan::all();
    $arr = [
      'plans'=> $plans
    ];
    return view('frontend.welcome',$arr);
  }
  public function contactus(Request $request)
  {
    return view('frontend.contactus');
  }
  public function saveContactUS(Request $request)
  {
    $data = $request->validate([
      'name'=> 'required|string|max:255',
      'email'=> 'required|email|max:255',
      'phone'=> 'required|string|max:255',
      'subject'=> 'required|string|max:255',
      'message'=> 'required|string|max:1000'
    ]);

    ContactUs::create($data);

    return status('We have received your message, we will be in touch with you soon!.');

  }
  public function policy(Request $request)
  {
    return view('frontend.policy');
  }
}
