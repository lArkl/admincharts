<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_information', function (Blueprint $table) {
            $table->increments('id');

            $table->string('company', 100);
            $table->string('role', 50); //update length on board
            $table->string('address', 120)->nullable(); //update nullable field
            $table->string('email', 50)->nullable();//update nullable field
            $table->string('phone', 12)->nullable();//update nullable field

            /**
             * Foreign Keys: Fields
             */
            $table->integer('user_id')->unsigned();

            /**
             * Foreign Keys: Rules
             */
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::table('job_information', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['user_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });
        Schema::dropIfExists('job_information');
    }
}
