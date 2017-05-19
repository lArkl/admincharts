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
    	
    	for ($i=0; $i < 10; $i++) { 
    		$random_index = array_rand($keys);

    		DB::table('categories')->insert([
    		'key' => $keys[$random_index],
   	    	'value' => $values[$random_index],
       		'subject' => $subjects[0]
        	]);
    	}    
    }
}
