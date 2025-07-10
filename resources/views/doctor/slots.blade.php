@extends("layouts.dashboard")
@section("title", "Dashboard - home")
@section("content")
    <h1>Medecin Crénaux</h1>
    {{ session('success') }}
    <form method="post" action="{{route('doctor.addSlot')}}">
        @csrf
        <label for="day">Jour</label>
        <input name="day" type="date">
        <label for="startTime">Temps de debut</label>
        <input name="startTime" type="time">
        <label for="endTime">Temps de fin</label>
        <input name="endTime" type="time" >
        <input type="submit" value="Ajouter">
    </form>
    @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif
@endsection
