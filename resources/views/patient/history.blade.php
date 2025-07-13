@extends("layouts.portal")
@section("title", "Portal - home")
@section("content")
    <h1>Votre historique</h1>
    {{ session('success') }}
    <table>
        <tr>
            <th>Jour</th>
            <th>Medecin</th>
            <th>heure debut</th>
            <th>duree (min)</th>
            <th>Status</th>
            <th>Compte rendu</th>
        </tr>
        @foreach($appointments as $appointment)
            <tr>
                <td>
                    {{$appointment->slot->day}}
                </td>
                <td>
                    {{$appointment->doctor->user->firstName}}
                </td>
                <td>
                    {{$appointment->slot->startTime}}
                </td>
                <td>
                    {{$appointment->slot->duration}}
                </td>
                <td>
                    {{$appointment->status}}
                </td>
                <td>
                    {{$appointment->report_id}}
                </td>
            </tr>
        @endforeach
    </table>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
