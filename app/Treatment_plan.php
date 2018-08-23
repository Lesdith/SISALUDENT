<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;
use Faker\Provider\pl_PL\Payment;

class Treatment_plan extends Model
{
    protected $fillable = [
        'patient_id',
        'start_date',
        'end_date',
        'subtotal',
        'discount',
        'total',
    ];
   
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function detail_treatment_plans()
    {
        return $this->hasMany(Detail_treatment_plan::class);
    }

    public function special_exam()
    {
        return $this->hasMany(special_exam::class);
    }

}
