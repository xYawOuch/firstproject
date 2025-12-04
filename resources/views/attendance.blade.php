@extends('layouts.hris')

@section('title', 'Attendance')

@section('content')
    <div class="container-fluid mt-4">

        <h2 class="fw-bold mb-4" style="font-family:'Orbitron',sans-serif;color:var(--accent);">
            Today's Attendance Summary
        </h2>

        {{-- Summary Cards --}}
        <div class="row g-4">

            {{-- DATE --}}
            <div class="col-md-4">
                <div class="p-3 rounded-3"
                    style="background:var(--card);border:1px solid var(--card-border);box-shadow:0 6px 18px rgba(0,212,255,0.08);">
                    <h6 class="text-muted">Date</h6>
                    <h3 class="fw-bold">Dec 04, 2025</h3>
                </div>
            </div>

            {{-- STATUS --}}
            <div class="col-md-4">
                <div class="p-3 rounded-3"
                    style="background:var(--card);border:1px solid var(--card-border);box-shadow:0 6px 18px rgba(0,212,255,0.08);">
                    <h6 class="text-muted">Status</h6>
                    <span class="badge px-4 py-2 fs-6"
                        style="background:rgba(0,212,255,0.15);color:var(--accent);border:1px solid var(--card-border);">
                        Present
                    </span>
                </div>
            </div>

            {{-- TOTAL HOURS --}}
            <div class="col-md-4">
                <div class="p-3 rounded-3"
                    style="background:var(--card);border:1px solid var(--card-border);box-shadow:0 6px 18px rgba(0,212,255,0.08);">
                    <h6 class="text-muted">Total Hours</h6>
                    <h3 class="fw-bold">08:45 hrs</h3>
                </div>
            </div>

            {{-- TIME IN --}}
            <div class="col-md-4">
                <div class="p-3 rounded-3"
                    style="background:var(--card);border:1px solid var(--card-border);box-shadow:0 6px 18px rgba(0,212,255,0.08);">
                    <h6 class="text-muted">Time In</h6>
                    <h3 class="fw-bold">08:15 AM</h3>
                </div>
            </div>

            {{-- TIME OUT --}}
            <div class="col-md-4">
                <div class="p-3 rounded-3"
                    style="background:var(--card);border:1px solid var(--card-border);box-shadow:0 6px 18px rgba(0,212,255,0.08);">
                    <h6 class="text-muted">Time Out</h6>
                    <h3 class="fw-bold">05:00 PM</h3>
                </div>
            </div>

            {{-- LATE / UNDERTIME / OT --}}
            <div class="col-md-4">
                <div class="p-3 rounded-3"
                    style="background:var(--card);border:1px solid var(--card-border);box-shadow:0 6px 18px rgba(0,212,255,0.08);">

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
        <h2 class="fw-bold mb-3" style="font-family:'Orbitron',sans-serif;color:var(--accent);">
            Attendance Records
        </h2>

        <div class="rounded-3"
            style="background:var(--card);border:1px solid var(--card-border);box-shadow:0 6px 18px rgba(0,212,255,0.12);">
            <div class="table-responsive">
                <table class="table mb-0 align-middle text-center" style="color:var(--text);">
                    <thead style="background:rgba(0,212,255,0.12);color:var(--accent);font-family:'Orbitron',sans-serif;">
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
                                <span class="badge"
                                    style="background:rgba(0,212,255,0.18);color:var(--accent);border:1px solid var(--card-border);">
                                    Present
                                </span>
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
                            <td>
                                <span class="badge bg-danger">Absent</span>
                            </td>
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
                            <td>
                                <span class="badge bg-warning text-dark">Leave</span>
                            </td>
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