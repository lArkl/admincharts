<?php

use Illuminate\Database\Seeder;

class PaymentInformationTableSeeder extends Seeder
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
    		DB::table('payment_information')->insert([
   	    	'document_type' => str_random(5),
   	    	'society' => $faker->company,
   	    	'ruc' => $faker->ean8,
   	    	'address' => $faker->streetAddress,
   	    	'phone' => $faker->ean8,
	        'email' => $faker->unique()->safeEmail,
       		'user_id' => rand(1, 10)
        	]);
    	}
    }
}
