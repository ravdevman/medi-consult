@extends("layouts.portal")
@section("title", "Portal - doctor")
@section("content")
    <form method="post" action="{{route('patient.portal')}}">
        @method('get')
        <input type="submit" value="Retour">
    </form>
    <h1>Detail medecin</h1>
    <div>
        {{$doctor->firstName}}
        {{$doctor->lastName}}
    </div>
@endsection
