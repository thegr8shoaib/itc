<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Saleman;

class SalemanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Factory::create();
      $salemans = ['Ali','Salman','Nadeem', 'Imran', 'John'];
      for ($i=0; $i < 5; $i++) {
        $data = [
          'name'=> $salemans[$i],
          'designation'=> $faker->sentence(1),
          'contactNumber'=> $faker->phoneNumber,
          'address'=> $faker->address
        ];
        $data['user_id'] = 1;
        Saleman::create($data);
      }


    }
}
