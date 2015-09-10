<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EditTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->string('name');
            $table->integer('user_id');
            $table->timestamp('workfinish');
            $table->integer('countWork');
            $table->float('price');
            $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('user_id');
            $table->dropColumn('workfinish');
            $table->dropColumn('countWork');
            $table->dropColumn('price');
            $table->dropColumn('status');

        });
    }
}
