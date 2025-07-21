<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Report;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = $request->status;
        $appointment->save();
        return redirect()->route('doctor.appointments')->with('success', 'Statut modifié avec succès.');;
    }

    public function report($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('doctor.report', compact('appointment'));
    }

    public function editReport($id)
    {
        $report = Report::findOrFail($id);
        return view('doctor.editReport', compact('report'));
    }

    public function updateReport(Request $request, $id)
    {
        $report = Report::findOrFail($id);

        $report->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('doctor.appointments')->with('success', 'Compte-rendu mis à jour avec succès.');
    }



    public function addReport(Request $request, $id)
    {
        $report = Report::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $appointment = Appointment::findOrFail($id);

        $appointment->report_id = $report->id;
        $appointment->save();

        return redirect()->route('doctor.appointments');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
