<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class special_exam extends Model
{
    protected $fillable = [
        'treatment_plan_id',
        'tooth_id',
        'image',
        'cost',
        'total',
    ];

    public function treatment_plan()
    {
        return $this->belongsTo(Treatment_plan::class);
    }

    public function tooth()
    {
        return $this->belongsTo(Tooth::class);
    }

}
