<?php

use Illuminate\Database\Seeder;

class AcademicInformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    	  $values = array('materials', 'finantials', 'human resources', 'supply chain management', 'information technologies');
    	
        for ($i=0; $i < 10; $i++) { 
    		DB::table('academic_information')->insert([
    		  'university' => str_random(10).' '.str_random(2).' '.str_random(8),
   	    	'faculty' => $values[array_rand($values)],
   	    	'school' => $values[array_rand($values)],
   	    	'current_semester' => rand(1, 12),
   	    	'email' => $faker->unique()->safeEmail,
       		'user_id' => rand(1, 10)
        	]);
    	}
    }
}
