@extends("layouts.dashboard")
@section("title", "Appointments - home")
@section("content")
    <h1>Ajouter un compte-rendu</h1>
    <form class="form-report" method="POST" action="{{route("doctor.updateReport", $report->id)}}">
        @method('PUT')
        @csrf
        <input type="text" name="title" placeholder="Titre" value="{{$report->title}}">
        <textarea rows="8"  placeholder="Contenu" name="content" >{{$report->content}}</textarea>
        <input type="submit" value="Modifier">
    </form>
@endsection
