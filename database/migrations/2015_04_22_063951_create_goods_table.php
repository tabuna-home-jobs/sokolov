<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->text('text');
            $table->string('lang');
            $table->string('avatar');
            $table->string('tag')->nullable();
            $table->string('descript')->nullable();
            $table->string('slug');
            $table->integer('category_id');
            $table->double('price');
            $table->json('attribute')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('goods');
    }
}
