<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class LangOrderField extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->integer('LangOrder_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('order', function (Blueprint $table) {
            $table->dropColumn('LangOrder_id');
        });
    }
}
