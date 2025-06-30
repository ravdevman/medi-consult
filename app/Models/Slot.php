<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'day',
        'startTime',
        'endTime',
        'duration',
        'isAvailable',
        'doctor_id'
    ];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
}
