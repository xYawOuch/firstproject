<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployeeAttendanceV2;

class EmployeeAttendanceV2Seeder extends Seeder
{
    public function run()
    {
        $data = [

            // Dec 07, 2025 — Rest Day
            [
                'user_id' => '0001',
                'date' => '2025-12-07',
                'status' => 'Rest Day',
                'time_in' => null,
                'time_out' => null,
            ],

            // Dec 06, 2025 — Rest Day
            [
                'user_id' => '0001',
                'date' => '2025-12-06',
                'status' => 'Rest Day',
                'time_in' => null,
                'time_out' => null,
            ],

            // Dec 05 — Leave
            [
                'user_id' => '0001',
                'date' => '2025-12-05',
                'status' => 'Leave',
                'time_in' => null,
                'time_out' => null,
            ],

            // Dec 04 — Present
            [
                'user_id' => '0001',
                'date' => '2025-12-04',
                'status' => 'Present',
                'time_in' => '07:28:00',
                'time_out' => '17:36:00',
            ],

            // Dec 03 — Present
            [
                'user_id' => '0001',
                'date' => '2025-12-03',
                'status' => 'Present',
                'time_in' => '07:24:00',
                'time_out' => '17:35:00',
            ],

            // Dec 02 — Present (late 1)
            [
                'user_id' => '0001',
                'date' => '2025-12-02',
                'status' => 'Present',
                'time_in' => '07:31:00',
                'time_out' => '17:35:00',
            ],

            // Dec 01 — Present (late 51)
            [
                'user_id' => '0001',
                'date' => '2025-12-01',
                'status' => 'Present',
                'time_in' => '08:21:00',
                'time_out' => '17:35:00',
            ],

            // Nov 30 — Rest Day
            [
                'user_id' => '0001',
                'date' => '2025-11-30',
                'status' => 'Rest Day',
                'time_in' => null,
                'time_out' => null,
            ],

            // Nov 29 — Rest Day
            [
                'user_id' => '0001',
                'date' => '2025-11-29',
                'status' => 'Rest Day',
                'time_in' => null,
                'time_out' => null,
            ],

            // Nov 28 — Leave
            [
                'user_id' => '0001',
                'date' => '2025-11-28',
                'status' => 'Leave',
                'time_in' => null,
                'time_out' => null,
            ],

            // Nov 27 — Present
            [
                'user_id' => '0001',
                'date' => '2025-11-27',
                'status' => 'Present',
                'time_in' => '07:58:00',
                'time_out' => '17:35:00',
            ],

            // Nov 26 — Present
            [
                'user_id' => '0001',
                'date' => '2025-11-26',
                'status' => 'Present',
                'time_in' => '07:34:00',
                'time_out' => '17:36:00',
            ],

            // Nov 25 — Absent AM (only 4.58 hrs)
            [
                'user_id' => '0001',
                'date' => '2025-11-25',
                'status' => 'Present',
                'time_in' => '09:00:00',
                'time_out' => '17:35:00',
            ],

            // Nov 24 — Absent (no time in/out)
            [
                'user_id' => '0001',
                'date' => '2025-11-24',
                'status' => 'Absent',
                'time_in' => null,
                'time_out' => null,
            ],

            // Nov 23 — Rest Day
            [
                'user_id' => '0001',
                'date' => '2025-11-23',
                'status' => 'Rest Day',
                'time_in' => null,
                'time_out' => null,
            ],
        ];

        foreach ($data as $row) {
            EmployeeAttendanceV2::create($row);
        }
    }
}
