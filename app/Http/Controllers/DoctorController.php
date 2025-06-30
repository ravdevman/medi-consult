<?php

namespace App\Http\Controllers;

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
        return view('doctor.slots');
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
            'doctor_id' => auth()->id(),
            'day' => $validated['day'],
            'startTime' => $validated['startTime'],
            'endTime' => $validated['endTime'],
            'duration' => $duration,
            'isAvailable' => false,
        ]);

        return redirect()->back()->with('success', 'Créneau ajouté avec succès.');
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
