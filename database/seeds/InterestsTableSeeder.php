<?php

use Illuminate\Database\Seeder;

class InterestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = array('materials', 'finantials', 'human resources', 'supply chain management', 'information technologies');
    	
    	for ($i=0; $i < 10; $i++) { 
    		DB::table('interests')->insert([
   	    	'area' => $values[array_rand($values)],
       		'user_id' => rand(1, 10)
        	]);
    	}
    }
}
