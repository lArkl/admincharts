<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/**
    	 * Stage 1
    	 */
        $this->call(StatesTableSeeder::class);
        $this->call(ProgramsTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);   
        $this->call(AspectsTableSeeder::class);   
        
        /**
         * Stage 2
         */
        $this->call(WorkshopsTableSeeder::class);
        
        /**
         * Stage 3
         */
        $this->call(SchedulesTableSeeder::class);
        $this->call(TopicsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ApplicationsTableSeeder::class);
    
        /**
         * Stage 4
         */
        $this->call(SubtopicsTableSeeder::class);
        
        /**
         * Stage 5
         */
        $this->call(PersonalInformationTableSeeder::class);
        $this->call(InterestsTableSeeder::class);
        $this->call(AcademicInformationTableSeeder::class);
        $this->call(JobInformationTableSeeder::class);
        $this->call(PaymentInformationTableSeeder::class);
    }
}
