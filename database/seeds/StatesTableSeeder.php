<?php

use Illuminate\Database\Seeder;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$values = array('approved', 'pending', 'rejected');
    	$subjects = array('workshop', 'account','application');
    	/*
    	for ($i=0; $i < 10; $i++) { 
    		DB::table('states')->insert([
   	    	'value' => $values[array_rand($values)],
       		'subject' => $subjects[array_rand($subjects)]
        	]);
    	}
        */
        for ($j=0; $j < 3; $j++) {
            for ($i=0; $i < 3; $i++) { 
                DB::table('states')->insert([
                'value' => $values[$i],
                'subject' => $subjects[$j]
                ]);
            }
        }
    }
}
