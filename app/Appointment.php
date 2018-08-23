<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'appointment_date',
        'appointment_time',
        'patient_id',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
}
