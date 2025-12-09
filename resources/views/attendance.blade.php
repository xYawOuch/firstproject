@extends('layouts.home')

@section('title', 'Attendance')

@section('content')
    <div class="container-fluid mt-4">

        <h2 class="page-title mb-4">Today's Attendance Summary</h2>

        {{-- Summary Cards --}}
        <div class="row g-4">

            {{-- DATE --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Date</h6>
                    <h3 class="fw-bold">Dec 04, 2025</h3>
                </div>
            </div>

            {{-- STATUS --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Status</h6>
                    <span class="hris-badge hris-badge-accent">Present</span>
                </div>
            </div>

            {{-- TOTAL HOURS --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Total Hours</h6>
                    <h3 class="fw-bold">08:45 hrs</h3>
                </div>
            </div>

            {{-- TIME IN --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Time In</h6>
                    <h3 class="fw-bold">08:15 AM</h3>
                </div>
            </div>

            {{-- TIME OUT --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Time Out</h6>
                    <h3 class="fw-bold">05:00 PM</h3>
                </div>
            </div>

            {{-- LATE / UNDERTIME / OT --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h6 class="text-muted">Late</h6>
                            <span class="fw-bold">15 mins</span>
                        </div>
                        <div>
                            <h6 class="text-muted">Undertime</h6>
                            <span class="fw-bold">0 mins</span>
                        </div>
                        <div>
                            <h6 class="text-muted">OT</h6>
                            <span class="fw-bold">1.5 hrs</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- Attendance Table --}}
    <div class="container-fluid mt-5">
        <h2 class="page-title mb-3">Attendance Records</h2>

        <div class="hris-table-wrapper">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center hris-table">
                    <thead class="hris-table-head">
                        <tr>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Status</th>
                            <th>Late</th>
                            <th>Undertime</th>
                            <th>Overtime</th>
                            <th>Total Hours</th>
                            <th>Half Day</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- Present --}}
                        <tr>
                            <td>2025-12-04</td>
                            <td>08:15 AM</td>
                            <td>05:00 PM</td>
                            <td>
                                <span class="hris-badge hris-badge-accent">Present</span>
                            </td>
                            <td>15 mins</td>
                            <td>0 mins</td>
                            <td>1.5 hrs</td>
                            <td>8.75 hrs</td>
                            <td>No</td>
                        </tr>

                        {{-- Absent --}}
                        <tr>
                            <td>2025-12-03</td>
                            <td>—</td>
                            <td>—</td>
                            <td><span class="hris-badge hris-badge-red">Absent</span></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>—</td>
                        </tr>

                        {{-- Leave --}}
                        <tr>
                            <td>2025-12-02</td>
                            <td>01:00 PM</td>
                            <td>05:00 PM</td>
                            <td><span class="hris-badge hris-badge-yellow">Leave</span></td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>4 hrs</td>
                            <td>Yes</td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection