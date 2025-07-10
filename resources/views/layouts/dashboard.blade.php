<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "Dashboard")</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <header class="card">
        <nav class="navbar">
            <h3>Mediconsult</h3>
            <ul  class="navbar-nav">
                <div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('doctor.dashboard')}}">Crenaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('doctor.appointments')}}">rendez-vous</a>
                    </li>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <input class="red-button" type="submit" value="Se déconnecter"/>
                </form>
            </ul>
        </nav>
    </header>
    <main class="card">
        <div class="container">
            @yield("content")
        </div>
        <footer>
            Copyright @ Mediconsult
        </footer>
    </main>
</body>
</html>
