@php use \App\Models\Appointment; @endphp

@extends("layouts.dashboard")
@section("title", "Appointments - home")
@section("content")
    <h1>List des rendez vous</h1>
    <table>
        <tr>
            <th>Patient</th>
            <th>Jour</th>
            <th>heure debut</th>
            <th>duree (min)</th>
            <th>Statu</th>
            <th>Compte rendu</th>
        </tr>
        @foreach($appointments as $appointment)
            <tr>
                <td>
                    {{$appointment->patient->user->firstName}}
                </td>
                <td>
                    {{$appointment->slot->day}}
                </td>
                <td>
                    {{$appointment->slot->startTime}}
                </td>
                <td>
                    {{$appointment->slot->duration}}
                </td>
                <td>
                    <form method="POST" action="{{ route('doctor.updateStatus', $appointment) }}">
                        @method('PUT')
                        @csrf
                        <select name="status" onchange="this.form.submit()">
                            <option value="{{ Appointment::STATUS_PENDING }}" {{ $appointment->status == Appointment::STATUS_PENDING ? 'selected' : '' }}>En attente</option>
                            <option value="{{ Appointment::STATUS_REFUSED }}" {{ $appointment->status == Appointment::STATUS_REFUSED ? 'selected' : '' }}>Refusé</option>
                            <option value="{{ Appointment::STATUS_VALIDATED }}" {{ $appointment->status == Appointment::STATUS_VALIDATED ? 'selected' : '' }}>Validé</option>
                        </select>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{ route('doctor.report', $appointment->id) }}">
                        @method('GET')
                        @csrf
                        <input type="submit" value="Ajouter un compte rendu">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
