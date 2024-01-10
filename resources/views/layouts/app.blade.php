<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>Jean Les Salles</h1>
    </header>

    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/salles">Liste des Salles</a></li>
            <li><a href="/formulaire">Ajout Salle</a></li>
            @auth
            <li>{{ Auth::user()->name }}</li>
            @else
            <li><a href="/register">Inscription</a></li>
            <li><a href="/login">Connexion</a></li>
            @endauth
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        {{ date('Y') }}
    </footer>
</body>
</html>