<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
          "name"=> "M Awais",
          "email"    => "mawaisnow@gmail.com",
          "password"=>bcrypt('mawaisnow@gmail.compassword'),
          "role"=>9,
          'balance'=> 10000
        ]);
        $user->save();
        Profile::create([
          'user_id'=> $user->id
        ]);
        $user = new User([
          "name"=> "M Awais",
          "email"    => "admin@clicktoearnmoney.com",
          "password"=>bcrypt('clicktoearnmoneypassword'),
          "role"=>9,
          'balance'=> 0
        ]);
        $user->save();
        Profile::create([
          'user_id'=> $user->id
        ]);

    }
}
