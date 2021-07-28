<?php

use App\Firm;
use App\Worker;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $firms = Firm::all();

        for ($i = 0; $i < 20; $i++) { 
            $newWorker = new Worker;
            $newWorker->firm_id = rand(1, count($firms));
            $newWorker->name = $faker->firstName();
            $newWorker->surname = $faker->lastName();
            $newWorker->phone = $faker->phoneNumber();
            $newWorker->email = $faker->email();
            $newWorker->save();
        }
    }
}
