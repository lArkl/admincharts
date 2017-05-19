<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');

            /**
             * On MariaDB:
             * session_date: YYYY-MM-DD
             * session_time: HH:MM:SS.ssssss
             */
            $table->date('session_date');
            $table->time('session_time');

            /**
             * Foreign Keys: Fields
             */
            $table->integer('workshop_id')->unsigned();

            /**
             * Foreign Keys: Rules
             */
            $table->foreign('workshop_id')->references('id')->on('workshops');

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
        Schema::table('schedules', function (Blueprint $table) {
            $table->dropForeign(['workshop_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['workshop_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });
        
        Schema::dropIfExists('schedules');
    }
}
