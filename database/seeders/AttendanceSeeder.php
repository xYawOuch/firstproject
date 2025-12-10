<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttendanceSeeder extends Seeder
{
    public function run()
    {
        DB::table('attendances')->insert([

            [
                'date' => '2025-12-04',
                'user_id' => '0001',
                'time_in' => '08:15:00',
                'time_out' => '17:00:00',
                'status' => 'Present',
                'late' => '15 mins',
                'undertime' => '0 mins',
                'overtime' => '1.5 hrs',
                'total_hours' => '8.75 hrs',
                'half_day' => 'No',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'date' => '2025-12-03',
                'user_id' => '0001',
                'time_in' => null,
                'time_out' => null,
                'status' => 'Absent',
                'late' => '0',
                'undertime' => '0',
                'overtime' => '0',
                'total_hours' => '0',
                'half_day' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'date' => '2025-12-02',
                'user_id' => '0001',
                'time_in' => '13:00:00',
                'time_out' => '17:00:00',
                'status' => 'Leave',
                'late' => '0',
                'undertime' => '0',
                'overtime' => '0',
                'total_hours' => '4 hrs',
                'half_day' => 'Yes',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'date' => '2025-12-25',
                'user_id' => '1003',
                'time_in' => '08:00:00',
                'time_out' => '17:00:00',
                'status' => 'Present',
                'late' => '0 mins',
                'undertime' => '0 mins',
                'overtime' => '0 hrs',
                'total_hours' => '8.00 hrs',
                'half_day' => 'No',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
