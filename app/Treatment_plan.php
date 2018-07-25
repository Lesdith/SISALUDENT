<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Treatment_plan extends Model
{
    protected $fillable = [
        'patient_id',
        'tooth_id',
        'diagnosis_id',
        'tooth_treatment_id',
        'description',
    ];
   
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function tooth()
    {
        return $this->belongsTo(Tooth::class);
    }

    public function diagnoses()
    {
        return $this->belongsTo(Diagnosis::class);
    }

    public function tooth_treatments()
    {
        return $this->belongsTo(Tooth_treatment::class);
    }

    public function daily_treatment_record()
    {
        return $this->hasMany(Daily_treatment_record::class);
    }
    
}
