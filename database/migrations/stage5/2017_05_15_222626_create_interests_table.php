<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interests', function (Blueprint $table) {
            $table->increments('id');

            $table->string('area', 30);

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
        Schema::table('interests', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['user_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });
        Schema::dropIfExists('interests');
    }
}
