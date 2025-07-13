<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "Portal")</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/portal.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
<header>
    <nav class="navbar">
        <h3>Mediconsult</h3>
        <ul  class="navbar-nav">
            <li><a href="/">Acceuil</a></li>
            <li><a href="{{route('patient.history')}}">Mon historique</a></li>
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
