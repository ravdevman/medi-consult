<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "Dashboard")</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <ul  class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('doctor.dashboard')}}">Crenaux</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('doctor.appointments')}}">rendez-vous</a>
                </li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Se déconnecter</button>
                </form>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            @yield("content")
        </div>
        <footer>
            Copyright @ Mediconsult
        </footer>
    </main>
</body>
</html>
