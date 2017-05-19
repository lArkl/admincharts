<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$keys = array('bi', 'bd', 'db', 'vz', 'pg');
    	$values = array('business intelligence', 'big data', 'databases', 'virtualization', 'programming');
    	$subjects = array('workshop');
    	
    	for ($i=0; $i < 5; $i++) { 
    		DB::table('categories')->insert([
    		'key' => $keys[$i],
   	    	'value' => $values[$i],
       		'subject' => $subjects[0]
        	]);
    	}    
    }
}