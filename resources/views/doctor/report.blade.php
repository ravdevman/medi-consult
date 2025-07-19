@extends("layouts.dashboard")
@section("title", "Appointments - home")
@section("content")
    <h1>Ajouter un compte rendu</h1>
    <form method="POST" action="{{route("doctor.addReport", $appointment->id)}}">
        @csrf
        <input type="text" name="title" placeholder="Titre">
        <textarea placeholder="Contenu" name="content"></textarea>
        <input type="submit" value="Ajouter">
    </form>
@endsection
