<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtopics', function (Blueprint $table) {
            $table->increments('id');

            $table->string('descriptor', 100);
            $table->integer('order');

            /**
             * Foreign Keys: Fields
             */
            $table->integer('topic_id')->unsigned();

            /**
             * Foreign Keys: Rules
             */
            $table->foreign('topic_id')->references('id')->on('topics');

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
        Schema::table('subtopics', function (Blueprint $table) {
            $table->dropForeign(['topic_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['topic_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });
        
        Schema::dropIfExists('subtopics');
    }
}
