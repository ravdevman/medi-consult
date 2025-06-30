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

    // Constantes pour les spécialités
    public const FIELDS = [
        'Generaliste' => 'Généraliste',
        'Cardiologue' => 'Cardiologue',
        'Rhumatologue' => 'Rhumatologue',
    ];

    // Constantes pour les villes
    public const CITIES = [
        'casablanca' => 'Casablanca',
        'rabat' => 'Rabat',
        'marrakech' => 'Marrakech',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
