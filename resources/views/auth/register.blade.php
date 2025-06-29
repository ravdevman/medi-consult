<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="container">
        <h1>Medi Condult - Register</h1>
        <div class="tabs">
            <div class="tab active" id="tab-patient" onclick="switchTab('patient')">Patient</div>
            <div class="tab" id="tab-doctor" onclick="switchTab('doctor')">Medecin</div>
        </div>

            <!-- Patient Form -->
            <div class="form-section active" id="patient-form">
                <div class="card">
                    <form action="{{route('user.store')}}" method="post" >
                        @csrf
                        <input type="hidden" name="role" value="patient">
                        <input name="firstName" type="text" placeholder="Prenom">
                        <input name="lastName" type="text" placeholder="Nom">
                        <input name="CIN" type="text" placeholder="CIN">
                        <input name="email" type="email" placeholder="Email">
                        <input name="password" type="password" placeholder="Mot de passe">
                        <input name="birthDate" type="date">
                        <input type="submit" value="Créer un compte">
                    </form>
                    <a href="{{route('login')}}" >Vous avez deja un compte</a>
                </div>
            </div>

            <!-- Doctor Form -->
            <div class="form-section" id="doctor-form">
                <div class="card">
                    <form action="{{route('user.store')}}" method="post" >
                        @csrf
                        <input type="hidden" name="role" value="doctor">
                        <input name="firstName" type="text" placeholder="Prenom">
                        <input name="lastName" type="text" placeholder="Nom">
                        <input name="email" type="email" placeholder="Email">
                        <input name="password" type="password" placeholder="Mot de passe">
                        <select name="field">
                            <option>Generaliste</option>
                        </select>
                        <select name="city">
                            <option>casablanca</option>
                        </select>
                        <input type="submit" value="Créer un compte">
                    </form>
                    <a href="{{route('login')}}" >Vous avez deja un compte</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchTab(type) {
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            document.getElementById('tab-' + type).classList.add('active');

            document.querySelectorAll('.form-section').forEach(form => {
                form.classList.remove('active');
            });
            document.getElementById(type + '-form').classList.add('active');
        }
    </script>
</body>
</html>
