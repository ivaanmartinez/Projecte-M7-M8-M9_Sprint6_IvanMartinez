<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Videos App' }}</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f6f9fc;
            margin: 0;
            padding: 0;
            color: #2c2c2c;
        }

        /* Header Styles */
        .app-header {
            background-color: #5a5aff;
            color: #ffffff;
            padding: 22px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .app-header-title {
            font-size: 25px;
            font-weight: bold;
            margin: 0;
            letter-spacing: 1px;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #4747d1;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .navbar-nav li {
            margin: 0 12px;
        }

        .navbar-nav a {
            color: #ffffff;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            transition: color 0.2s;
        }

        .navbar-nav a:hover {
            text-decoration: underline;
            color: #80ff80;
        }

        .auth-nav {
            margin-right: 20px;
        }

        .user-info {
            color: #ffffff;
            margin-right: 15px;
            font-weight: bold;
        }

        .navbar-nav-a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
        }

        .navbar-nav-a:hover {
            color: #80ff80;
        }

        main {
            padding: 20px;
            min-height: calc(100vh - 200px);
        }

        /* Footer Styles */
        .app-footer {
            background-color: #e3e8ee;
            color: #444;
            padding: 12px 20px;
            text-align: center;
            border-top: 1px solid #ccc;
            margin-top: 30px;
        }

        .app-footer-text {
            font-size: 14px;
            margin: 0;
            color: #5a5aff;
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body>
<header class="app-header">
    <h1 class="app-header-title">Videos App</h1>
</header>

<!-- Navbar -->
<nav class="navbar">
    <ul class="navbar-nav">
        <li><a href="{{ route('videos.index') }}">Inici</a></li>
        @auth
            @can('manage videos')
                <li><a href="{{ route('videos.manage.index') }}">Gestió de Vídeos</a></li>
            @endcan
            @can('manage users')
                <li><a href="{{ route('users.manage.index') }}">Gestió d'usuaris</a></li>
            @endcan
            @can('manage series')
                <li><a href="{{ route('series.manage.index') }}">Gestió de Sèries</a></li>
            @endcan
        @endauth
    </ul>

    <div class="auth-nav">
        @auth
            <span class="user-info">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); this.closest('form').submit();"
                   class="navbar-nav-a">
                    Tancar sessió
                </a>
            </form>
        @else
            <a href="{{ route('login') }}" class="navbar-nav-a">Iniciar sessió</a>
            @if(Route::has('register'))
                <a href="{{ route('register') }}" class="navbar-nav-a">Registrar-se</a>
            @endif
        @endauth
    </div>
</nav>

<main>
    {{ $slot }}
</main>

<footer class="app-footer">
    <p class="app-footer-text">&copy; {{ date('Y') }} Videos App | Ivan</p>
</footer>
</body>
</html>
