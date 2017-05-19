<?php

use Illuminate\Database\Seeder;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	for ($i=0; $i < 10; $i++) { 
    		DB::table('schedules')->insert([
       		'session_date' => $faker->date,
       		'session_time' => $faker->time,
       		'workshop_id' => rand(1, 10)
        	]);
    	}
    }
}
