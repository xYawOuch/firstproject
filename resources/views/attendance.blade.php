@extends('layouts.home')

@section('title', 'Attendance')

@section('content')
    @php
        // safe summary pre-computation to avoid complex inline expressions
        $first = $attendance->first();

        $summaryDate = $first && $first->date ? $first->date->format('M d, Y') : '—';
        $summaryTimeIn = $first && $first->time_in ? \Carbon\Carbon::parse($first->time_in)->format('h:i A') : '—';
        $summaryTimeOut = $first && $first->time_out ? \Carbon\Carbon::parse($first->time_out)->format('h:i A') : '—';
        $summaryStatus = $first->status ?? 'N/A';
        $summaryTotalHours = $first
            ? floor($first->total_minutes / 60) . 'h ' . ($first->total_minutes % 60) . 'm'
            : '0h 0m';
        $summaryLate = $first->late ?? '0';
        $summaryUndertime = $first->undertime ?? '0';
        $summaryOvertime = $first->overtime ?? '0';
    @endphp

    <div class="container-fluid mt-4">

        <h2 class="page-title mb-4">Today's Attendance Summary</h2>

        {{-- Summary Cards --}}
        <div class="row g-4">

            {{-- DATE --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Date</h6>
                    <h3 class="fw-bold">{{ $summaryDate }}</h3>
                </div>
            </div>

            {{-- STATUS --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Status</h6>
                    @if($summaryStatus === 'Present')
                        <span class="hris-badge hris-badge-accent">Present</span>
                    @elseif($summaryStatus === 'Absent')
                        <span class="hris-badge hris-badge-red">Absent</span>
                    @elseif($summaryStatus === 'Leave')
                        <span class="hris-badge hris-badge-yellow">Leave</span>
                    @else
                        <span class="hris-badge hris-badge-gray">{{ $summaryStatus }}</span>
                    @endif
                </div>
            </div>

            {{-- TOTAL HOURS --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Total Hours</h6>
                    <h3 class="fw-bold">{{ $summaryTotalHours }}</h3>
                </div>
            </div>

            {{-- TIME IN --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Time In</h6>
                    <h3 class="fw-bold">{{ $summaryTimeIn }}</h3>
                </div>
            </div>

            {{-- TIME OUT --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <h6 class="text-muted">Time Out</h6>
                    <h3 class="fw-bold">{{ $summaryTimeOut }}</h3>
                </div>
            </div>

            {{-- LATE / UNDERTIME / OT --}}
            <div class="col-md-4">
                <div class="hris-card">
                    <div class="d-flex justify-content-between text-center">
                        <div>
                            <h6 class="text-muted">Late</h6>
                            <span class="fw-bold">{{ $summaryLate }}</span>
                        </div>
                        <div>
                            <h6 class="text-muted">Undertime</h6>
                            <span class="fw-bold">{{ $summaryUndertime }}</span>
                        </div>
                        <div>
                            <h6 class="text-muted">OT</h6>
                            <span class="fw-bold">{{ $summaryOvertime }}</span>
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
                        @forelse ($attendance as $row)
                            <tr>
                                <td>{{ $row->date?->format('Y-m-d') }}</td>

                                {{-- Time in / out formatting done here, single-line to avoid parser issues --}}
                                <td>{{ $row->time_in ? \Carbon\Carbon::parse($row->time_in)->format('h:i A') : '—' }}</td>
                                <td>{{ $row->time_out ? \Carbon\Carbon::parse($row->time_out)->format('h:i A') : '—' }}</td>

                                <td>
                                    @php $s = strtolower($row->status ?? ''); @endphp
                                    @if (strpos($s, 'present') !== false)
                                        <span class="hris-badge hris-badge-accent">Present</span>
                                    @elseif (strpos($s, 'absent') !== false)
                                        <span class="hris-badge hris-badge-red">Absent</span>
                                    @else
                                        <span class="hris-badge hris-badge-yellow">{{ $row->status }}</span>
                                    @endif
                                </td>

                                <td>{{ $row->late }}</td>
                                <td>{{ $row->undertime }}</td>
                                <td>{{ $row->overtime }}</td>
                                <td>
                                    {{ floor($row->total_minutes / 60) }}h
                                    {{ $row->total_minutes % 60 }}m
                                </td>
                                <td>{{ $row->half_day ?? '—' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center py-4">No attendance records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection