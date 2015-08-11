<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('order', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('OrderFile');
            $table->string('status');
            $table->float('price');
            $table->timestamp('workfinish');
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
        Schema::drop('order');
	}

}
