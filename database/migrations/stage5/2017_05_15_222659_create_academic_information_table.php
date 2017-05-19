<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_information', function (Blueprint $table) {
            $table->increments('id');

            $table->string('university', 30); //update order on board
            $table->string('faculty', 30);
            $table->string('school', 30);   // update name on board, before it was speciality
            $table->string('current_semester', 4);  //update length on board
            $table->string('email', 50)->nullable(); //update nullable field

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
        Schema::table('academic_information', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['user_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });
        Schema::dropIfExists('academic_information');
    }
}
