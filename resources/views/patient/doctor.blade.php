@extends("layouts.portal")
@section("title", "Portal - doctor")
@section("content")
    <form class="back" method="post" action="{{route('patient.portal')}}">
        @method('get')
        <input type="submit" value="Retour">
    </form>
    <h1><i class="bi bi-heart-pulse-fill" style="margin-right: 10px; font-size: 24px"></i>Detail medecin</h1>
    {{ session('success') }}
    <div class="doctor-details-container">
        <div class="detail-row">
            <h3>Nom :</h3>
            <p>{{$doctor->lastName}}</p>
        </div>
        <div class="detail-row">
            <h3>Prenom :</h3>
            <p>{{$doctor->firstName}}</p>
        </div>

        <div class="detail-row">
            <h3>Specialite :</h3>
            <p>{{$doctor->doctor->field}}</p>
        </div>

        <div class="detail-row">
            <h3>Ville :</h3>
            <p>{{$doctor->doctor->city}}</p>
        </div>

        <h2 class="sub-title-section"><i class="bi bi-calendar-week-fill" style="margin-right: 10px"></i>Liste des disponibilités: </h2>
        <table class="booking-table">
            <tr>
                <th>Jour</th>
                <th>heure debut</th>
                <th>duree (min)</th>
                <th>Rendez vous</th>
            </tr>
        @foreach($slots as $slot)
            <tr>
                <td>
                    {{$slot->day}}
                </td>
                <td>
                    {{$slot->startTime}}
                </td>
                <td>
                 {{$slot->duration}}
                </td>
                <td>
                    <form method="post" action="{{route('patient.makeAppointment', $slot)}}">
                        @csrf
                        <input type="submit" value="Reserver" {{ $slot->isAvailable == false ? 'disabled' : '' }}>
                    </form>
                </td>
            </tr>
        @endforeach
        </table>

    </div>
@endsection
