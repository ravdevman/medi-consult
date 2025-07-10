<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "Portal")</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portal.css') }}">
</head>
<body>
<header>
    <nav class="navbar">
        <h3>Mediconsult</h3>
        <ul  class="navbar-nav">
            <li>Acceuil</li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <input type="submit" class="red-button" value="Se déconnecter" />
        </form>
    </nav>
</header>
<main>
    <div class="container">
        @yield("content")
    </div>
    <!-- <footer>
        Copyright @ Mediconsult
    </footer> -->
</main>
</body>
</html>
