@php use App\Models\Doctor; @endphp
@extends("layouts.portal")
@section("title", "Portal - home")
@section("content")
    <h1>Bienvenue  {{ucfirst(auth()->user()->firstName)}} !</h1>
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
                @switch($doctor->doctor->field)
                    @case('Generaliste')
                        <img src="{{ asset('images/all.avif') }}" alt="Généraliste">
                        @break
                    @case('Cardiologue')
                        <img src="{{ asset('images/cardio.jpg') }}" alt="Cardiologue">
                        @break

                    @case('Rhumatologue')
                        <img src="{{ asset('images/rhum.jpg') }}" alt="Rhumatologue">
                        @break

                    @default
                        <img src="{{ asset('images/fields/default.png') }}" alt="Médecin">
                @endswitch
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
