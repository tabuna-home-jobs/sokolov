<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableBlog extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('blog', function(Blueprint $table)
      {
              $table->increments('id');
              $table->string('title');
              $table->string('name');
              $table->text('content');
              $table->string('avatar');
        $table->string('lang');
              $table->string('tag');
              $table->string('descript');
        $table->string('slug');
              $table->timestamps();
              $table->softDeletes();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('blog');
    }

}
