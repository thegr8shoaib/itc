<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $array = [
        'user'=> Auth::user(),
        'profile'=> Auth::user()->profile
      ];


        return view('user.profile', $array);
    }
    public function profileUpdate(Request $request, User $user)
    {
        if (!isAuthorizedToModify($user->id)) {
            return error('Access Denied');
        }
        $array = [
          'user'=> $user,
          'profile'=> $user->profile
        ];

        return view('user.profileUpdate', $array);
    }
    public function profileStore(Request $request, User $user)
    {
        if (!isAuthorizedToModify($user->id)) {
            return error('Access Denied');
        }
        if ($request->tab == "account") {
            return $this->account($request, $user);
        }
        if ($request->tab == "information") {
            return $this->information($request, $user);
        }
        if ($request->tab == "social") {
            return $this->social($request, $user);
        }
    }
    public function social($request, $user)
    {
        $request->validate([
        'twitter'=> 'nullable|string|max:255',
        'facebook'=> 'nullable|string|max:255',
        'instagram'=> 'nullable|string|max:255',
        'github'=> 'nullable|string|max:255',
        'codepen'=> 'nullable|string|max:255',
        'slack'=> 'nullable|string|max:255',
        'linkdin'=> 'nullable|string|max:255'
      ]);


        Profile::where('user_id', $user->id)->update([
        'twitter' => $request->twitter,
        'facebook' => $request->facebook,
        'instagram' => $request->instagram,
        'github' => $request->github,
        'codepen' => $request->codepen,
        'slack' => $request->slack,
        'linkdin' => $request->linkdin
      ]);

        return status('User updated');
    }
    public function information($request, $user)
    {
        $request->validate([
        'dob'=> 'nullable|string|max:255',
        'mobile'=> 'nullable|string|max:255',
        'website'=> 'nullable|string|max:255',
        'gender'=> 'nullable|string|max:255',
        'address1'=> 'nullable|string|max:255',
        'address2'=> 'nullable|string|max:255',
        'postcode'=> 'nullable|string|max:255',
        'city'=> 'nullable|string|max:255',
        'state'=> 'nullable|string|max:255',
        'country'=> 'nullable|string|max:255'
      ]);


        Profile::where('user_id', $user->id)->update([
        'mobile' => $request->mobile,
        'dob' => $request->dob,
        'website'=> $request->website,
        'gender'=> $request->gender,
        'address1'=> $request->address1,
        'address2'=> $request->address2,
        'postcode'=> $request->postcode,
        'city'=> $request->city,
        'state'=> $request->state,
        'country'=> $request->country
      ]);

        return status('User updated');
    }


    public function account($request, $user)
    {
        $request->validate([
          'name'=> 'required|string'
        ]);
        $user->name = $request->name;


        if ($request->hasFile('image')) {
            $request->validate([
          'image'=> 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);
            $user->image = $request->image->store('profilePics');
        }

        if (superAdmin()) {
            if ($request->status == 1) {
                $user->status = 1;
            } elseif ($request->status == 2) {
                $user->status = 2;
            } else {
                $user->status = 0;
            }
        }

        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }

        $request->validate([
          'company'=> 'nullable|string|max:255'
        ]);

        if ($request->hasFile('cover')) {
            $request->validate([
            'cover'=> 'mimes:jpeg,jpg,png,gif|required|max:10000'
          ]);
            $imagePath = $request->cover->store('profilePics');
            Profile::where('user_id', $user->id)->update([
              'cover'  => $imagePath
            ]);

        }

        Profile::where('user_id', $user->id)->update([
          'company'=> $request->company
        ]);


        $user->save();

        return status('User updated');
    }
}
