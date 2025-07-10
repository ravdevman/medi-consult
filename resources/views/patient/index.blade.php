@php use App\Models\Doctor; @endphp
@extends("layouts.portal")
@section("title", "Portal - home")
@section("content")
    <h1>Bienvenue  Rayane !</h1>
    {{ session('success') }}
    <div class="center-container">
        <div class="container-card search">
            <h5>Filtre</h5>
            <form method="get" action="{{route('patient.portal')}}">
                <label>Spécialité</label>
                <select name="field">
                    <option value="">Tous</option>
                    @foreach (Doctor::FIELDS as $key => $label)
                        <option value="{{ $key }}"  {{ request('field') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <label>Ville</label>
                <select name="city">
                    <option value="">Tous</option>
                    @foreach (Doctor::CITIES as $key => $label)
                        <option value="{{ $key }}" {{ request('city') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <input type="submit" value="rechercher">
            </form>
        </div>
    </div>
    <h3>Medecin Disponible</h3>
    <div class="container-doctors-list">
        @foreach($doctors as $doctor)
            <div class="container-card">
                <img src="https://www.future-doctor.de/wp-content/uploads/2024/08/shutterstock_2480850611.jpg" />
                <h5>Dr. {{$doctor->lastName}} {{$doctor->firstName}}</h5>
                <h6>{{$doctor->doctor->field}} . {{$doctor->doctor->city}}</h6>

                <form method="post" action="{{route('patient.showDoctor', $doctor->id)}}">
                    @method('GET')
                    @csrf
                    <input type="submit" value="voir">
                </form>
            </div>
        @endforeach
    </div>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
