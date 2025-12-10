<!doctype html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('title', 'HRIS')</title>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Exo+2:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="hris-topbar">
        <i class="bi bi-list hris-burger"></i>
        <span class="hris-topbar-title">HRIS Dashboard</span>
    </div>
    <div class="sidebar-overlay"></div>


    {{-- SIDEBAR --}}
    @include('layouts.sidebar')

    {{-- PAGE WRAPPER --}}
    <div class="main-content">
        @yield('content')
    </div>

    {{-- Theme Toggle Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    <script src="{{ asset('js/sidebar-toggle.js') }}"></script>

</body>

</html>