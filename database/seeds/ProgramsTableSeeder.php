<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $keys = array('pit', 'pes');
    	$values = array('programa de informacion y tecnologias', 'programa de especializacion');
    	
    	for ($i=0; $i < 2; $i++) { 
    		$random_index = array_rand($keys);

    		DB::table('programs')->insert([
    		'key' => $keys[$random_index],
   	    	'value' => $values[$random_index],
       		'subject' => 'workshop'
        	]);
    	}
    }
}
