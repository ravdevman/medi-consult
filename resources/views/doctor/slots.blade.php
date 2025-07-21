@extends("layouts.dashboard")
@section("title", "Dashboard - home")
@section("content")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <h1>Médecin - Créneaux</h1>

    @if (session('success'))
        <div class="alert-success">
            <i class="bi bi-check-circle-fill"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="container-slot">
        <form method="post" action="{{ route('doctor.addSlot') }}">
            @csrf

            <label for="day">Jour</label>
            <input name="day" id="day" type="text" placeholder="Choisissez une date disponible">

            <label for="startTime">Heure de début</label>
            <input name="startTime" id="startTime" type="text" placeholder="Ex: 08:30">

            <label for="endTime">Heure de fin</label>
            <input name="endTime" id="endTime" type="text" placeholder="Ex: 09:00">

            <input type="submit" value="Ajouter">
        </form>

        <div class="container-slot-list">
            <h2>Mes créneaux</h2>
            <div class="list">
                @if($slots->isEmpty())
                    <div>Vous n'avez aucun créneau.</div>
                @else
                    @foreach ($slots as $slot)
                        <div class="slot">
                            <form action="{{ route('doctor.destroySlot', $slot->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">
                                    <i class="bi bi-ban" style="color: #e63737; margin-right: 10px"></i>Supprimer
                                </button>
                                <h3>Jour</h3>
                                <h4>{{ $slot->day }}</h4>
                                <h3>Heure de début</h3>
                                <h4>{{ $slot->startTime }}</h4>
                                <h3>Heure de fin</h3>
                                <h4>{{ $slot->endTime }}</h4>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert-fail">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        const today = new Date().toISOString().split('T')[0];

        flatpickr("#day", {
            dateFormat: "Y-m-d",
            minDate: "today",
        });

        flatpickr("#startTime", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        });

        flatpickr("#endTime", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
        });
    </script>
@endsection
