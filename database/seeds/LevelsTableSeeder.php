<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = array('essentials', 'fundamentals', 'advanced', 'specialist', 'master');
    	$subjects = array('workshop');
    	
    	for ($i=0; $i < 10; $i++) { 
    		DB::table('levels')->insert([
   	    	'value' => $values[array_rand($values)],
       		'subject' => $subjects[0]
        	]);
    	}
    }
}
