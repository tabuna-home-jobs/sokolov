<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSharesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->text('content');
            $table->string('avatar');
            $table->string('lang');
            $table->string('tag')->nullable();
            $table->string('descript')->nullable();
            $table->timestamp('start');
            $table->timestamp('end');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('shares');
    }
}
