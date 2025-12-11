<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class EmployeeAttendanceV2 extends Model
{
    protected $table = 'employee_attendance_v2';
    protected $fillable = [
        'user_id',
        'date',
        'time_in',
        'time_out',
        'status',
        'late',
        'undertime',
        'overtime',
        'total_minutes',
        'half_day',
    ];
    protected $casts = [
        'date' => 'date',
        'time_in' => 'datetime:H:i',
        'time_out' => 'datetime:H:i',
    ];


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($row) {

            // ---------------------------------------------
            // 1. REST DAY / LEAVE / ABSENT = no calculations
            // ---------------------------------------------
            if (in_array($row->status, ['Rest Day', 'Leave', 'Absent'])) {

                $row->late = 0;
                $row->undertime = 0;
                $row->overtime = 0;
                $row->total_minutes = 0;
                $row->total_hours = '0h 0m';
                $row->half_day = 0;

                return;
            }

            // ---------------------------------------------
            // 2. Must have BOTH time_in and time_out
            // ---------------------------------------------
            if (!$row->time_in || !$row->time_out) {

                // No complete pair → no work hours
                $row->total_minutes = 0;
                $row->total_hours = '0h 0m';
                return;
            }

            // ---------------------------------------------
            // 3. Define STANDARD WORK SCHEDULE
            // Later, this will be dynamic per user (step 1)
            // ---------------------------------------------
            $scheduleIn = Carbon::parse('07:30');
            $scheduleOut = Carbon::parse('17:35');

            $in = Carbon::parse($row->time_in);
            $out = Carbon::parse($row->time_out);

            // ---------------------------------------------
            // 4. Compute TOTAL WORKED MINUTES
            // ---------------------------------------------
            $workMinutes = $in->diffInMinutes($out);
            $row->total_minutes = $workMinutes;

            // Convert to Xh Ym format
            $row->total_hours = floor($workMinutes / 60) . 'h ' . ($workMinutes % 60) . 'm';

            // ---------------------------------------------
            // 5. Compute LATE
            // If Employee comes after scheduled time_in
            // ---------------------------------------------
            $late = $scheduleIn->diffInMinutes($in, false);
            $row->late = $late > 0 ? $late : 0;

            // ---------------------------------------------
            // 6. Compute UNDERTIME
            // If time_out is earlier than scheduled out
            // ---------------------------------------------
            $undertime = $out->diffInMinutes($scheduleOut, false);
            $row->undertime = $undertime < 0 ? abs($undertime) : 0;

            // ---------------------------------------------
            // 7. Compute OVERTIME
            // If working beyond scheduled out
            // ---------------------------------------------
            $overtime = $out->diffInMinutes($scheduleOut, false);
            $row->overtime = $overtime > 0 ? $overtime : 0;

            // ---------------------------------------------
            // 8. Compute HALF-DAY
            // (EXAMPLE: time_out < 1PM → half day)
            // ---------------------------------------------
            $halfDayCutoff = Carbon::parse('13:00');
            $row->half_day = $out < $halfDayCutoff ? 1 : 0;
        });
    }
}
