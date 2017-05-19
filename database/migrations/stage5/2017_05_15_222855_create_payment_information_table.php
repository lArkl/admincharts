<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_information', function (Blueprint $table) {
            $table->increments('id');

            $table->string('document_type', 10);
            $table->string('society', 100);
            $table->string('ruc', 11); //update on board
            $table->string('address', 120)->nullable(); //update on board
            $table->string('phone', 12)->nullable(); //update on board
            $table->string('email', 50)->nullable(); //update on board

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
        Schema::table('payment_information', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['user_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });
        Schema::dropIfExists('payment_information');
    }
}
