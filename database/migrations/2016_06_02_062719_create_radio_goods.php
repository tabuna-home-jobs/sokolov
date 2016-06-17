<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRadioGoods extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->boolean('calculator')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('goods', function (Blueprint $table) {
            $table->drop('calculator');
        });
    }
}
