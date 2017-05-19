<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');

            $table->string('descriptor', 100);
            $table->integer('order');

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
        Schema::table('topics', function (Blueprint $table) {
            $table->dropForeign(['workshop_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['workshop_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });
        
        Schema::dropIfExists('topics');
    }
}
