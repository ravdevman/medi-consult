@extends("layouts.portal")
@section("title", "Portail - Médecin")
@section("content")
    <form class="back" method="post" action="{{ route('patient.history') }}">
        @method('get')
        <input type="submit" value="Retour">
    </form>

    <h1>Compte rendu</h1>
    {{ session('success') }}

    <div class="doctor-details-container">
        <div class="detail-row">
            <h3>Titre :</h3>
            <p>{{ $report->title }}</p>
        </div>
        <div class="detail-row">
            <h3>Contenu :</h3>
            <p>{{ $report->content }}</p>
        </div>
    </div>
@endsection
