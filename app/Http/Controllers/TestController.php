<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Plan;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function test(Request $request)
    {

      $array = bankNames();
      foreach ($array as $arr) {
        $abc = $arr['code'];
        $path = public_path()."/gatewayLogos/" . strtolower($arr['name']) . ".png";
        if (file_exists($path)) {

        }else {
        downloadUrlToFile("https://ebanking.meezanbank.com/AmbitRetailFrontEnd/images/banklogos/logoSmall/$abc.png",$path);
        }

      }
      // newNoti(1, "Project Due on is updated", "project Due Date has been added", route('profile'), 0);
    }

}
