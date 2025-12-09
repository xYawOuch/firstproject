<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;700&family=Exo+2:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="auth-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="header-left">
                            <img src="{{ asset('images/logo2.png') }}" class="logo">
                            <div class="title">
                                <div class="main">@yield('card_title')</div>
                                <div class="sub">@yield('card_sub')</div>
                            </div>
                        </div>

                        <button id="theme-toggle">
                            <span id="theme-icon">🌙</span>
                        </button>
                    </div>

                    <div class="card-body">
                        @yield('card_body')
                        @include('footer')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    <script src="{{ asset('js/password-toggle.js') }}"></script>

</body>

</html>