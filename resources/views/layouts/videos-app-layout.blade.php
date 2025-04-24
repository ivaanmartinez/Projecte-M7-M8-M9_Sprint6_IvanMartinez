<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Videos App' }}</title>
    <style>
        /* General Styles */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            flex-direction: column;
        }

        /* Header Styles */
        .app-header {
            background-color: #212121;
            color: #fff;
            padding: 40px 0;
            text-align: center;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            position: relative; /* Necesario para posicionar auth-nav dentro */
        }

        .app-header-title {
            font-size: 32px;
            font-weight: 700;
            margin: 0;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Auth Navigation - ahora en header, arriba a la derecha */
        .auth-nav {
            position: absolute;
            top: 10px;
            right: 20px;
        }

        .auth-nav .user-info {
            color: #fff;
            margin-right: 10px;
            font-weight: 600;
        }

        .navbar-nav-a {
            color: #fff;
            font-size: 16px;
            text-transform: uppercase;
            margin: 0 5px;
            text-decoration: none;
        }

        .navbar-nav-a:hover {
            color: #d4af37;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #333;
            padding: 12px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .navbar-nav li {
            display: inline-block;
            margin: 0 30px;
        }

        .navbar-nav a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: color 0.3s ease;
        }

        .navbar-nav a:hover {
            color: #d4af37;
        }

        /* Main Content Styles */
        main {
            flex: 1;
        }

        /* Footer Styles */
        .app-footer {
            background-color: #212121;
            color: #aaa;
            padding: 20px 0;
            text-align: center;
            border-top: 2px solid #444;
        }

        .app-footer-text {
            font-size: 14px;
            margin: 0;
            color: #bbb;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            .navbar-nav li {
                display: block;
                margin: 10px 0;
            }

            .auth-nav {
                position: static;
                margin-top: 10px;
                text-align: center;
            }
        }
    </style>
    @vite('resources/css/app.css')
</head>
<body>

<header class="app-header">
    <h1 class="app-header-title">Videos App - Ivan Martinez Perez</h1>

    <!-- MOVIDO AQUÍ: Auth nav a la esquina superior derecha -->
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
</header>

<!-- Navbar -->
<nav class="navbar">
    <ul class="navbar-nav">
        <li><a href="{{ route('videos.manage.index') }}">Gestió de Vídeos</a></li>
        <li><a href="{{ route('videos.index') }}">Inici</a></li>
        <li><a href="{{ route('users.manage.index') }}">Gestio D'usuaris</a></li>
        <li><a href="{{ route('series.manage.index') }}">Gestio De Series</a></li>
    </ul>
</nav>

<main>
    {{ $slot }}
</main>

<footer class="app-footer">
    <p class="app-footer-text">&copy; {{ date('Y') }} Videos App | Ivan Martinez Perez</p>
</footer>

</body>
</html>
