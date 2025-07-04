<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Login</title>
</head>
<body>
        <div class="card">
            <div class="section formSection">
                    <h4 >Se connecter à</h4>
                    <h3>Medi Condult</h3>
                    <form method="post" action="{{route('login')}}">
                        @csrf
                        <input name="email" type="email" placeholder="Email">
                        <input name="password" type="password" placeholder="mot de passe">
                        <input type="submit" value="Se connecter">
                    </form>
                    <a href="{{route('register')}}" >Ou crée un compte</a>
            </div>
            <div class="section">
                <img src="{{ asset('images/hero.jpg') }}" />
            </div>
        </div>
</body>
</html>
