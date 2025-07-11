<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Slot;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slots = Slot::where('doctor_id', auth()->user()->doctor->id)->get();
        return view('doctor.slots', compact('slots'));
    }

    public function appointments() {
        $appointments = Appointment::where('doctor_id', auth()->user()->doctor->id)->get();

        return view('doctor.appointments', compact('appointments'));
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

    public function addSlot(Request $request)
    {
        $validated = $request->validate([
            'day' => 'required|date',
            'startTime' => 'required|date_format:H:i',
            'endTime' => 'required|date_format:H:i|after:startTime',
        ]);


        $start = Carbon::createFromFormat('H:i', $validated['startTime']);
        $end = Carbon::createFromFormat('H:i', $validated['endTime']);;

        $duration = $start->diffInMinutes($end);


        Slot::create([
            'doctor_id' => auth()->user()->doctor->id,
            'day' => $validated['day'],
            'startTime' => $validated['startTime'],
            'endTime' => $validated['endTime'],
            'duration' => $duration,
            'isAvailable' => true,
        ]);

        return redirect()->back()->with('success', 'Créneau ajouté avec succès.');
    }

    public function destroySlot($id)
    {
        $slot = Slot::findOrFail($id);
        $slot->delete();
        return back()->with('success', 'Créneau supprimé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
