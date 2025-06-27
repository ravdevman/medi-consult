<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    protected $fillable = [
        'day',
        'startDate',
        'endDate',
        'duration',
        'doctor_id'
    ];

    public function doctor() {
        return $this->belongsTo(Doctor::class);
    }
}
