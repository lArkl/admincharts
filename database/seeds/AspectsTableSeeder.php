<?php

use Illuminate\Database\Seeder;

class AspectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = array('global', 'performance', 'security');
    	$subjects = array('workshop');
    	
    	for ($i=0; $i < 10; $i++) { 
    		DB::table('aspects')->insert([
   	    	'value' => $values[array_rand($values)],
       		'subject' => $subjects[0]
        	]);
    	}
    }
}
