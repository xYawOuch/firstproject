<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('employee_attendance_v2', function (Blueprint $table) {
            $table->id();

            // employee number (NOT user.id)
            $table->string('user_id');

            // Attendance core fields
            $table->date('date');
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();

            // Calculations (IN MINUTES)
            $table->integer('late')->default(0);
            $table->integer('undertime')->default(0);
            $table->integer('overtime')->default(0);
            $table->integer('total_minutes')->default(0);

            // Half day? (0 = no, 1 = yes)
            $table->boolean('half_day')->default(0);

            // Status (Present, Absent, Leave)
            $table->string('status')->default('Present');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_attendance_v2');
    }
};

