<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkshopsTable extends Migration
{    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->increments('id');
            
            /**
             * The "technology", "release", "description", and "url" fields
             * build a social network post (twitter, instagram, or facebook [140])
             */ 
            $table->string('technology', 30);
            $table->string('release', 9);
            $table->string('description', 50);

            /** 
             * These urls have been set with tinyurl.com and assume the "https://"
             */
            $table->string('url', 19);
            $table->string('catalog_image_url', 19);
            $table->string('about_image_url', 19);

            /**
             * Foreign Keys: Fields
             */
            $table->integer('state_id')->unsigned();
            $table->integer('program_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('aspect_id')->unsigned();

            /**
             * Foreign Keys: Rules
             */
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('program_id')->references('id')->on('programs');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('aspect_id')->references('id')->on('aspects');

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
        //Schema::disableForeignKeyConstraints();
        Schema::table('workshops', function (Blueprint $table) {
            $table->dropForeign(['state_id']);
            $table->dropForeign(['program_id']);
            $table->dropForeign(['level_id']);
            $table->dropForeign(['category_id']);
            /**
             * If down() only wants to remove FKs (rules + fields), add this line: 
             * $table->dropColumn(['state_id', 'program_id', 'level_id', 'category_id']);
             * It's not necessary for this case because the following dropIfExists() drops them. 
             */
        });

        Schema::dropIfExists('workshops');
    }
}
