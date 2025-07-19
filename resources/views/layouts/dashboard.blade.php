<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title", "Dashboard")</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>
    <header class="card">
        <nav class="navbar">
            <img src="{{ asset('images/logo.png') }}" class="logo">
            <ul  class="navbar-nav">
                <div>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('doctor.dashboard')}}"><i class="bi bi-smartwatch" style="margin-right: 10px"></i>Crenaux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('doctor.appointments')}}"><i class="bi bi-clipboard-check-fill" style="margin-right: 10px"style="margin-right: 10px"></i>rendez-vous</a>
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
