<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Detail_treatment_plan extends Model
{
    protected $fillable = [
        'treatment_plan_id',
        'tooth_id',
        'diagnosis_id',
        'tooth_treatment_id',
        'cost',
        'description',
       
    ];

    public function treatment_plan()
    {
        return $this->belongsTo(Treatment_plan::class);
    }

    public function tooth()
    {
        return $this->belongsTo(Tooth::class);
    }

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class);
    }

    public function tooth_treatment()
    {
        return $this->belongsTo(Tooth_treatment::class);
    }
   

    public function perform_treatments()
    {
        return $this->hasMany(Perform_treatment::class);
    }
}
