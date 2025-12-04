<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_id')->unique()->after('id');

            $table->string('first_name')->after('user_id');
            $table->string('middle_name')->nullable()->after('first_name');
            $table->string('last_name')->after('middle_name');
            $table->dropColumn('name');

            $table->dropUnique('users_email_unique');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('user_id');

            $table->dropColumn(['first_name', 'middle_name', 'last_name']);
            $table->string('name')->after('id');

            $table->string('email')->unique()->change();
        });
    }

};
