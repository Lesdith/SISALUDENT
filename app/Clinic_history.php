<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Clinic_history extends Model
{
    protected $fillable = [
        'patient_id',
        'infectious_disease',
        'disease_name',
        'cardiac',
        'allergic',
        'what_you_allergy',
        'diabetic',
        'pregnant',
        'epileptic',
        'observations',
    ];  
    
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
