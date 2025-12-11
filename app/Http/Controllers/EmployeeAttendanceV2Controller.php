<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAttendanceV2;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmployeeAttendanceV2Controller extends Controller
{
    public function index()
    {
        $userId = auth()->user()->user_id;

        $attendance = EmployeeAttendanceV2::where('user_id', $userId)
            ->orderBy('date', 'desc')
            ->get();

        return view('attendance', compact('attendance'));
    }
}
