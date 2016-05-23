<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTableWork extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('work', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('goods_id');
            $table->string('name');
            $table->text('before');
            $table->text('after');
            $table->string('lang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('work');
    }
}
