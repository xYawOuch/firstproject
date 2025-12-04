<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'HRIS')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Exo+2:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Exo+2:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

</head>

<body class="h-100 dark">

    <!-- Sidebar -->
    <div class="sidebar position-fixed top-0 start-0">
        <h4 class="fw-bold mb-4">HRIS</h4>

        <nav class="d-flex flex-column gap-3">
            <a href="#" class="active"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
            <a href="#"><i class="bi bi-people me-2"></i> Employees</a>
            <a href="{{ route('attendance') }}"><i class="bi bi-calendar-check me-2"></i> Attendance</a>
            <a href="#"><i class="bi bi-file-earmark-text me-2"></i> Leave</a>
            <a href="#"><i class="bi bi-cash-stack me-2"></i> Payroll</a>
            <a href="#"><i class="bi bi-gear me-2"></i> Settings</a>
        </nav>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main">

        <!-- Navbar -->
        <nav class="main-nav d-flex justify-content-between align-items-center px-4 py-3 mb-4 shadow-sm">
            <button id="theme-toggle" type="button" aria-pressed="false" title="Toggle theme">
                <span id="theme-icon">🌙</span>
            </button>


            <div class="dropdown">
                <a href="#" class="text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle fs-4"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Page Content -->
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SAME THEME TOGGLE BEHAVIOR FROM auth.txt -->
    <script src="{{ asset('js/theme-home.js') }}"></script>


</body>

</html>