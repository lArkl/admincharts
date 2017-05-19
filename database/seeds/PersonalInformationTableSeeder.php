<?php

use Illuminate\Database\Seeder;

class PersonalInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
    	
        for ($i=0; $i < 15; $i++) {
    		DB::table('personal_information')->insert([
   	    	'first_name' => $faker->firstName,
   	    	'middle_name' => $faker->firstName,
   	    	'first_surname' => $faker->lastName,
   	    	'second_surname' => $faker->lastName,

   	    	'document_type' => str_random(5),
		      'document_number' => $faker->ean8,

			    'birthdate' => $faker->date,

          'phone' => $faker->ean8,
	        'email' => $faker->unique()->safeEmail,

	        'user_id' => $i+1
        	]);
    	}
    }
}
