<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        $array = [
          'users'=> User::where('role','!=', 9)->paginate(20)
        ];

        return view('user.list.index',$array);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
      User::where('id', $id)->delete();
      return status('User has been deleted successfully');
    }
}
