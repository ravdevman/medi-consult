@extends("layouts.dashboard")
@section("title", "Dashboard - home")
@section("content")
    <h1>Medecin Crénaux</h1>
    {{ session('success') }}
    <div class="container-slot">
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
        <div class="container-slot-list">
            <h2>Mes crénaux</h2>
            <div class="list">
            @foreach ($slots as $slot)
                <div class="slot">
                    <form action="{{ route('doctor.destroySlot', $slot->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="supprimer">
                        <h3>Jour</h3>
                        <h3>{{$slot->day}}</h3>
                        <h3>Temps de debut</h3>
                        <h3>{{$slot->startTime}}</h3>
                        <h3>Temps de fin</h3>
                        <h3>{{$slot->endTime}}</h3>
                    </form>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif
@endsection
