<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('category', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->string('lang');
            $table->text('text');
            $table->string('avatar');
            $table->string('tag')->nullable();
            $table->string('descript')->nullable();
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
        Schema::drop('category');
	}

}
