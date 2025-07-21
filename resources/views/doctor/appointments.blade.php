@php use \App\Models\Appointment; @endphp

@extends("layouts.dashboard")
@section("title", "Rendez-vous - Accueil")
@section("content")
    <h1>Liste des rendez-vous</h1>

    <?php if(session('success')): ?>
    <div class="alert-success">
        <i class="bi bi-check-circle-fill"></i>
            <?php echo e(session('success')); ?>

    </div>
    <?php endif; ?>
    <table>
        <tr>
            <th>Patient</th>
            <th>Jour</th>
            <th>Heure de début</th>
            <th>Durée (min)</th>
            <th>Statut</th>
            <th>Compte rendu</th>
        </tr>

        @if($appointments->isEmpty())
            <tr>
                <td colspan="6" style="text-align: center;">
                    Vous n’avez aucun rendez-vous.
                </td>
            </tr>
        @else
            @foreach($appointments as $appointment)
                <tr>
                    <td>
                        {{ $appointment->patient->user->firstName }}
                    </td>
                    <td>
                        {{ $appointment->slot->day }}
                    </td>
                    <td>
                        {{ $appointment->slot->startTime }}
                    </td>
                    <td>
                        {{ $appointment->slot->duration }}
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
                        @if($appointment->report_id)
                            <a href="{{ route('doctor.editReport', $appointment->report_id) }}">Modifier le compte-rendu</a>
                        @else
                        <form method="GET" action="{{ route('doctor.report', $appointment->id) }}">
                            @csrf
                            <input type="submit" value="Ajouter un compte-rendu">
                        </form>
                        @endif

                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection
