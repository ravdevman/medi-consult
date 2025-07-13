<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Slot;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $doctors = User::where('role', 'doctor')
            ->with('doctor')
            ->whereHas('doctor', function ($q) use ($request) {
                if ($request->filled('field')) {
                    $q->where('field', $request->field);
                }
                if ($request->filled('city')) {
                    $q->where('city', $request->city);
                }
            })
            ->get();


        return view('patient.index', compact('doctors'));
    }

    public function history()
    {
        $appointments = Appointment::where('patient_id', auth()->user()->patient->id)->get();
        return view('patient.history', compact('appointments'));
    }

    public function showDoctor($id) {
        $doctor = User::where(['role' => 'doctor', 'id' => $id])->with('doctor')->first();
        $slots = Slot::where(['doctor_id' =>$doctor->doctor->id])->get();
        return view('patient.doctor', compact('doctor', 'slots'));
    }

    public function makeAppointment(Slot $slot) {
        Appointment::create([
            'slot_id' => $slot->id,
            'doctor_id' => $slot->doctor->id,
            'status' => Appointment::STATUS_PENDING,
            'patient_id' => auth()->user()->patient->id,
            'report_id' => null,
        ]);

        $slot->isAvailable = false;
        $slot->save();

        return redirect()->back()->with('success', 'Rendez-vous créé avec succès.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
