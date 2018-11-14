<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Dental_history extends Model
{
    protected $fillable = [
        'patient_id',
        'dental_hemorrhage',
        'mouth_infections',
        'mouth_ulcers',
        'reaction_anesthesia',
        'what_reaction',
        'toothache',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
