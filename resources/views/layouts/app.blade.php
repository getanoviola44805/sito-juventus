<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titolo', 'Juventus') - Sito non ufficiale</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <header class="header">
        <div class="header-overlay">
            <div class="header-top">
                <a href="{{ route('home') }}" class="logo">JUVENTUS</a>

                <button class="menu-toggle" id="menuToggle" aria-label="Apri menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <nav class="nav" id="nav">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('giocatori.index') }}">Rosa</a></li>
                        <li><a href="{{ route('classifica') }}">Classifica</a></li>
                        @guest
                            <li><a href="{{ route('login') }}">Accedi</a></li>
                            <li><a href="{{ route('registrazione') }}">Registrati</a></li>
                        @endguest
                        @auth
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="form-logout">
                                    @csrf
                                    <button type="submit" class="link-logout">Esci ({{ auth()->user()->name }})</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>

            <div class="header-titolo">
                <h1>@yield('intestazione', 'Fino alla fine')</h1>
            </div>
        </div>
    </header>

    <main class="contenuto">
        @yield('contenuto')
    </main>

    <footer class="footer">
        <div class="footer-inner">
            <p>Sito realizzato a scopo didattico. Non affiliato alla società.</p>
            <p>Progetto per l'esame di Web Programming &mdash; {{ date('Y') }}</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>