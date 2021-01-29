<?php

use Illuminate\Database\Seeder;
use App\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
          [
            'name' => 'Starter  Plan',
            'price' => 1500,
            'totalReturn'=> 3000,
            'dailyEarning'=> 50,
            'dailyAds'=> 5,
            'referCommission'=> "10%",
            'packegeDurration'=> 60,
            'minimumWithdraw'=> 500,
            'status' => 1
          ],
          [
            'name' => 'Student Plan',
            'price' => 2500,
            'totalReturn'=> 5000,
            'dailyEarning'=> 83,
            'dailyAds'=> 5,
            'referCommission'=> "10%",
            'packegeDurration'=> 60,
            'minimumWithdraw'=> 800,
            'status' => 1
          ],
          [
            'name' => 'Silver Plan',
            'price' => 3500,
            'totalReturn'=> 7000,
            'dailyEarning'=> 116,
            'dailyAds'=> 5,
            'referCommission'=> "10%",
            'packegeDurration'=> 60,
            'minimumWithdraw'=> 1200,
            'status' => 1
          ],
          [
            'name' => 'Bronze Plan',
            'price' => 5000,
            'totalReturn'=> 10000,
            'dailyEarning'=> 166,
            'dailyAds'=> 5,
            'referCommission'=> "10%",
            'packegeDurration'=> 60,
            'minimumWithdraw'=> 1700,
            'status' => 1
          ],
          [
            'name' => 'Golden Plan',
            'price' => 7500,
            'totalReturn'=> 15000,
            'dailyEarning'=> 250,
            'dailyAds'=> 5,
            'referCommission'=> "10%",
            'packegeDurration'=> 60,
            'minimumWithdraw'=> 2500,
            'status' => 1
          ],
          [
            'name' => 'Diamond Plan',
            'price' => 10000,
            'totalReturn'=> 20000,
            'dailyEarning'=> 333,
            'dailyAds'=> 5,
            'referCommission'=> "10%",
            'packegeDurration'=> 60,
            'minimumWithdraw'=> 3000,
            'status' => 1
          ],
          [
            'name' => 'Business Plan',
            'price' => 15000,
            'totalReturn'=> 30000,
            'dailyEarning'=> 500,
            'dailyAds'=> 5,
            'referCommission'=> "10%",
            'packegeDurration'=> 60,
            'minimumWithdraw'=> 5000,
            'status' => 1
          ],
          [
            'name' => 'Business Plus Plan',
            'price' => 20000,
            'totalReturn'=> 40000,
            'dailyEarning'=> 666,
            'dailyAds'=> 5,
            'referCommission'=> "10%",
            'packegeDurration'=> 60,
            'minimumWithdraw'=> 7500,
            'status' => 1
          ]
        ];

        foreach ($plans as $plan) {
          Plan::create($plan);
        }


    }
}
