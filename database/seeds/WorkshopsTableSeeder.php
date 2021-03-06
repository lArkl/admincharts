<?php

use Illuminate\Database\Seeder;

class WorkshopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $technologies = array('Laravel', 'VueJs', 'Angular4', 'UML');
        $releases = array('12', '2', '1.0.0', '18i');

        for ($i=0; $i < 15; $i++) { 
        	DB::table('workshops')->insert([
        	'technology' => $technologies[array_rand($technologies)],
     		'release' => $releases[array_rand($releases)],
     		'description' => $faker->text(50),
     		'url' => $faker->text(19),
     		'catalog_image_url' => 'tinyurl.com/mo7vjbd',//$faker->imageUrl(800, 500),
     		'about_image_url' => 'tinyurl.com/mo7vjbd',//$faker->imageUrl(750, 500),
     		'state_id' => rand(1, 3),
     		'program_id' => rand(1, 2),
     		'level_id' => rand(1, 5),
     		'category_id' => rand(1, 5),
     		'aspect_id' => rand(1, 10),
            'created_at' => $faker->dateTimeThisYear($max='now')
          	]);
        }
    }
}
