<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Perform_treatment extends Model
{
    protected $fillable = [
    'detail_treatment_plan_id',      
    'doctor_id',                      
    'status',
    ]; 


    public function detail_treatment_plan()
    {
        return $this->belongsTo(Detail_treatment_plan::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
