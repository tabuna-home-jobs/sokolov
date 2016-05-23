<?php

use Illuminate\Database\Migrations\Migration;

class CreateNewColumsUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->boolean('email_notification')->default(1);
            $table->boolean('phone_notification')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('phone_notification');
            $table->dropColumn('email_notification');
        });
    }
}
