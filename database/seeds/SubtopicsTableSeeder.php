<?php

use Illuminate\Database\Seeder;

class SubtopicsTableSeeder extends Seeder
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
    		DB::table('subtopics')->insert([
       		'descriptor' => $faker->text(100),
       		'order' => rand(1, 2).rand(1, 9),
       		'topic_id' => rand(1, 10)
        	]);
    	}
    }
}
