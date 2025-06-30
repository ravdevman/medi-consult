@php use App\Models\Doctor; @endphp
@extends("layouts.portal")
@section("title", "Portal - home")
@section("content")
    <h1>Patient Portal</h1>
    {{ session('success') }}
    <div>
        <form method="get" action="{{route('patient.portal')}}">
            <select name="field">
                <option value="">Tous</option>
                @foreach (Doctor::FIELDS as $key => $label)
                    <option value="{{ $key }}"  {{ request('field') == $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <select name="city">
                <option value="">Tous</option>
                @foreach (Doctor::CITIES as $key => $label)
                    <option value="{{ $key }}" {{ request('city') == $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            <input type="submit" value="rechercher">
        </form>
    </div>
    @foreach($doctors as $doctor)
        <div>
            {{$doctor->firstName}}
            {{$doctor->doctor->city}}
            <form method="post" action="{{route('patient.showDoctor', $doctor->id)}}">
                @method('GET')
                @csrf
                <input type="submit" value="voir">
            </form>
        </div>

    @endforeach

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
