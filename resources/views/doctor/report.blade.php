@extends("layouts.dashboard")
@section("title", "Appointments - home")
@section("content")
    <form class="back" method="post" action="{{route('doctor.appointments')}}">
        @method('get')
        <input style="width: fit-content" type="submit" value="Retour">
    </form>
    <h1>Ajouter un compte-rendu</h1>
    <form class="form-report" method="POST" action="{{route("doctor.addReport", $appointment->id)}}">
        @csrf
        <input type="text" name="title" placeholder="Titre">
        <textarea rows="8"  placeholder="Contenu" name="content"></textarea>
        <input type="submit" value="Ajouter">
    </form>
@endsection
