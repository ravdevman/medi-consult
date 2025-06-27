<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'field',
        'city',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
