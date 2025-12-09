<aside class="hris-sidebar">

    <div class="sidebar-header">
        <img src="{{ asset('images/logo2.png') }}" class="sidebar-logo" alt="HRIS Logo">
        <h2>HRIS</h2>
    </div>

    <nav class="sidebar-nav">

        <a href="/dashboard" class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>

        <a href="/attendance" class="nav-item {{ request()->is('attendance') ? 'active' : '' }}">
            <i class="bi bi-calendar-check"></i> Attendance
        </a>

        <a href="/employees" class="nav-item {{ request()->is('employees') ? 'active' : '' }}">
            <i class="bi bi-people"></i> Employees
        </a>

        <a href="/payroll" class="nav-item {{ request()->is('payroll') ? 'active' : '' }}">
            <i class="bi bi-cash-coin"></i> Payroll
        </a>

        <a href="/reports" class="nav-item {{ request()->is('reports') ? 'active' : '' }}">
            <i class="bi bi-bar-chart"></i> Reports
        </a>
    </nav>

    <div class="sidebar-footer">
        <button id="theme-toggle" type="button" aria-pressed="false" title="Toggle theme">
            <span id="theme-icon">🌙</span>
        </button>

        <a href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-btn">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</aside>