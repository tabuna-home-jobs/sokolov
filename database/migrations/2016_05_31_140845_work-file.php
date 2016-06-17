<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WorkFile extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('work', function (Blueprint $table) {
            $table->text('download')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('work', function (Blueprint $table) {
            $table->drop('download');
        });
    }
}
