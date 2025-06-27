<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
</head>
<body>
    <h1>Medi Condult - Register</h1>
    <form action="{{route('user.store')}}" method="post">
        @method('POST')
        @csrf
        <input name="lastName" type="text" placeholder="nom">
        <input name="firstName" type="text" placeholder="prenom">
        <input name="CIN" placeholder="cin" type="text">
        <input name="email" type="email" placeholder="email">
        <input name="password" type="password" placeholder="mot de passe">
        <input name="birthDate" type="date">
        <input type="submit" value="Cree un compte">
    </form>
</body>
</html>
