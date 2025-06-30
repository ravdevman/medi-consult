@extends("layouts.portal")
@section("title", "Portal - doctor")
@section("content")
    <form method="post" action="{{route('patient.portal')}}">
        @method('get')
        <input type="submit" value="Retour">
    </form>
    <h1>Detail medecin</h1>
    {{ session('success') }}
    <div>
        {{$doctor->firstName}}
        {{$doctor->lastName}}
        <table>
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
                    <form>
                </td>
            </tr>
        @endforeach
        </table>

    </div>
@endsection
