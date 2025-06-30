<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'status',
        'slot_id',
        'patient_id',
        'doctor_id',
        'report_id',
    ];

    public function patient() {
        return $this->belongsTo(Patient::class);
    }

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }

    public function slot() {
        return $this->belongsTo(Slot::class);
    }

    public function report() {
        return $this->belongsTo(Report::class);
    }

}
