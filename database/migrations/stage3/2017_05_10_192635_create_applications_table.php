<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->increments('id');

            /**
             * On MariaDB:
             * application_date: YYYY-MM-DD
             * application_time: HH:MM:SS.ssssss
             */
            $table->date('application_date');
            $table->time('application_time');

            /**
             * Foreign Keys: Fields
             */
            $table->integer('workshop_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('state_id')->unsigned();

            /**
             * Foreign Keys: Rules
             */
            $table->foreign('workshop_id')->references('id')->on('workshops');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('state_id')->references('id')->on('states');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign(['workshop_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['state_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['workshop_id', 'user_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });
        
        Schema::dropIfExists('applications');
    }
}
