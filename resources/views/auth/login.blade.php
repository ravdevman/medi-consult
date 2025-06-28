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
    <div class="container">
        <h1>Medi Condult - login</h1>
        <div class="card">
            <form method="post" action="{{route('login')}}">
                @csrf
                <input name="email" type="email" placeholder="Email">
                <input name="password" type="password" placeholder="mot de passe">
                <input type="submit" value="Se connecter">
            </form>
            <a href="{{route('register')}}" >Cree un compte</a>
        </div>
    <div>

</body>
</html>
