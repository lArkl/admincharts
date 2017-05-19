<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name', 15);
            $table->string('middle_name', 15)->nullable(); // update nullable on board
            $table->string('first_surname', 15);
            $table->string('second_surname', 15);

            $table->string('document_type', 10);
            $table->string('document_number', 15); // update diagram on board

            $table->date('birthdate');

            $table->string('phone', 12);
            $table->string('email', 50);

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
        Schema::table('personal_information', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['user_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });
        Schema::dropIfExists('personal_information');
    }
}
