<?php

use Illuminate\Database\Seeder;

class JobInformationTableSeeder extends Seeder
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
    		DB::table('job_information')->insert([
   	    	'company' => $faker->company,
   	    	'role' => $faker->jobTitle,
   	    	'address' => $faker->streetAddress,
   	    	'phone' => $faker->ean8,
	        'email' => $faker->unique()->safeEmail,
       		'user_id' => rand(1, 10)
        	]);
    	}
    }
}
