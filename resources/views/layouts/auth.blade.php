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
    <style>
        /* all your shared CSS variables, theme rules and styles */
        :root {
            --bg: #0a0e1a;
            --card: #0f1520;
            --muted: #a8b5c8;
            --primary-1: #001a33;
            /* dark navy */
            --primary-2: #00bfff;
            /* bright cyan */
            --accent: #00d4ff;
            --input-bg: #111d2e;
            --text: #e8ecf5;
            --header-text: #fff;
            --btn-outline: rgba(232, 236, 245, 0.08);
        }

        [data-theme="light"] {
            --bg: #f0f4fa;
            --card: #fafbfd;
            --muted: #4a5f7f;
            --primary-1: #003d7a;
            --primary-2: #0099cc;
            --accent: #0088bb;
            --input-bg: #f5f8fc;
            --text: #0a0e1a;
            --header-text: #fff;
            --btn-outline: rgba(10, 14, 26, 0.06);
        }

        html,
        body {
            height: 100%
        }

        body {
            background: radial-gradient(circle at 12% 12%, rgba(0, 191, 255, 0.04), transparent 6%), var(--bg);
            color: var(--text);
            font-family: 'Exo 2', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0
        }

        .title .main {
            font-family: 'Orbitron', sans-serif !important;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .title .sub {
            font-family: 'Exo 2', sans-serif !important;
        }

        .card {
            background: var(--card);
            border: none;
            border-radius: 15px;
            box-shadow: 0 12px 30px rgba(0, 20, 40, 0.6), 0 4px 18px rgba(0, 191, 255, 0.06);
            max-width: 420px
        }

        .card-header {
            background: linear-gradient(90deg, var(--primary-1) 10%, var(--primary-2) 100%);
            color: var(--header-text);
            font-weight: 700;
            font-size: 1.05rem;
            padding: 12px 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            justify-content: space-between;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 12px
        }

        .logo {
            max-height: 72px;
            filter: drop-shadow(0 8px 18px rgba(0, 191, 255, 0.15));
        }

        #theme-toggle {
            width: 44px;
            height: 34px;
            padding: 0;
            border-radius: 8px;
            border: 1px solid var(--btn-outline);
            background: transparent;
            color: var(--text);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 16px
        }

        .form-label {
            color: var(--text) !important;
            font-weight: 600
        }

        .form-control {
            background: var(--input-bg);
            border: 1px solid rgba(255, 255, 255, 0.03);
            color: var(--text);
            transition: border-color .15s, box-shadow .15s
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.35)
        }

        [data-theme="light"] .form-control::placeholder {
            color: rgba(15, 23, 36, 0.45)
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.15rem rgba(0, 212, 255, 0.15);
            border-color: var(--accent);
            outline: none
        }

        .btn-primary {
            background: linear-gradient(180deg, var(--primary-1), var(--primary-2));
            border: none;
            color: #fff;
            font-weight: 600
        }

        .card-body small {
            color: var(--muted)
        }

        .card-body .text-muted {
            color: var(--muted) !important
        }

        .btn-outline-light {
            color: var(--text) !important;
            border-color: var(--btn-outline) !important;
            background: transparent !important
        }

        .text-center .btn-outline-light {
            padding: .25rem .6rem;
            font-size: .85rem
        }

        @media (max-width:576px) {
            .card {
                margin: 15px;
                max-width: 100%
            }

            .card-header {
                flex-direction: column;
                text-align: center;
                gap: 8px;
                align-items: center
            }

            #theme-toggle {
                margin-top: 6px
            }
        }
    </style>
</head>

<body>
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

                        <button id="theme-toggle" type="button" aria-pressed="false" title="Toggle theme">
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
    <script>
        (function () {
            const btn = document.getElementById('theme-toggle');
            const icon = document.getElementById('theme-icon');
            function current() { return document.documentElement.getAttribute('data-theme') || 'dark'; }
            function apply(t) { document.documentElement.setAttribute('data-theme', t); localStorage.setItem('theme', t); btn.setAttribute('aria-pressed', t === 'light'); icon.textContent = t === 'light' ? '☀️' : '🌙'; }
            btn.addEventListener('click', () => apply(current() === 'dark' ? 'light' : 'dark'));
            apply(current());
        })();
    </script>
</body>

</html>