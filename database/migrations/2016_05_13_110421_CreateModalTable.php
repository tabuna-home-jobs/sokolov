<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('modals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('body');
            $table->string('lang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('modals');
    }
}
