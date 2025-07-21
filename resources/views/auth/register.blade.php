@php use App\Models\Doctor; @endphp
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
<div class="card card-reverse">
    <div class="section formSection">
        <h4>Crée un compte</h4>
        <h3>Medi Condult</h3>
        <div class="tabs">
            <div class="tab active" id="tab-patient" onclick="switchTab('patient')">Patient</div>
            <div class="tab" id="tab-doctor" onclick="switchTab('doctor')">Medecin</div>
        </div>

        <!-- Patient Form -->
        <div class="form-section-container active" id="patient-form">
                <form action="{{route('user.store')}}" method="post">
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
                <a href="{{route('login')}}">Vous avez deja un compte</a>
        </div>

        <!-- Doctor Form -->
        <div class="form-section-container" id="doctor-form">
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="role" value="doctor">
                    <input name="firstName" type="text" placeholder="Prenom">
                    <input name="lastName" type="text" placeholder="Nom">
                    <input name="email" type="email" placeholder="Email">
                    <input name="password" type="password" placeholder="Mot de passe">
                    <select name="field">
                        @foreach (Doctor::FIELDS as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <select name="city">
                        @foreach (Doctor::CITIES as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="Créer un compte">
                </form>
                <a href="{{route('login')}}">Vous avez deja un compte</a>
        </div>
        <?php if($errors->any()): ?>
        <div class="alert-fail">
            <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
    <div class="section">
        <img src="{{ asset('images/hero.jpg') }}" />
    </div>
    </div>
</div>

<script>
    function switchTab(type) {
        document.querySelectorAll('.tab').forEach(tab => {
            tab.classList.remove('active');
        });
        document.getElementById('tab-' + type).classList.add('active');

        document.querySelectorAll('.form-section-container').forEach(form => {
            form.classList.remove('active');
        });
        document.getElementById(type + '-form').classList.add('active');
    }
</script>
</body>
</html>
