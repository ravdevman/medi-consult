@extends("layouts.dashboard")
@section("title", "Appointments - home")
@section("content")
    <h1>List des rendez vous</h1>
    <table>
        <tr>
            <th>Patient</th>
            <th>heure debut</th>
            <th>duree (min)</th>
            <th>Statu</th>
        </tr>
        @foreach($appointments as $appointment)
            <tr>
                <td>
                    {{$appointment->patient->user->firstName}}
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
            </tr>
        @endforeach
    </table>
@endsection
