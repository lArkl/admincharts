<?php

use Illuminate\Database\Seeder;

class ApplicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	for ($i=0; $i < 40; $i++) { 
    		DB::table('applications')->insert([
       		'application_date' => $faker->dateTimeThisYear($max='now'),
       		'application_time' => $faker->time,
       		'workshop_id' => rand(1, 15),
       		'user_id' => rand(1, 15),
          'state_id' => rand(7, 9)
        	]);
    	}
    }
}
