<?php

namespace App\Http\Controllers;

use App\Models\Attendance;

class AttendanceController extends Controller
{
    // public function index()
    // {
    //     // Fetch all attendance records (newest first)
    //     $attendances = Attendance::orderBy('date', 'desc')->get();

    //     // Pass data to the Blade
    //     return view('attendance', compact('attendances'));
    // }

    public function index()
    {
        $userId = auth()->user()->user_id; // employee number

        $attendances = Attendance::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->get();

        return view('attendance', compact('attendances'));
    }


}
