<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Author extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->string('author');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('blog', function (Blueprint $table) {
            $table->dropColumn('author');
        });
    }
}
