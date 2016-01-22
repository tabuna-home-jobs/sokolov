<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableSeo extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('story_id')->unique()->nullable();
            $table->text('url');
            $table->text('route');
            $table->string('title');
            $table->string('description');
            $table->string('keywords');
            $table->string('robots');
            $table->text('image');
            $table->text('video');
            $table->text('audio');
            $table->text('custom');
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
        Schema::drop('seo');
    }

}
