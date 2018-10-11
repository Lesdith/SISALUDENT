<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Tooth extends Model
{
    protected $fillable = [
        'name',
        'tooth_type_id',
        'tooth_stage_id',
        'tooth_position_id',
    ];

    public function tooth_type()
    {
        return $this->belongsTo(Tooth_type::class);
    }

    public function tooth_stage()
    {
        return $this->belongsTo(Tooth_stage::class);
    }

    public function tooth_position()
    {
        return $this->belongsTo(Tooth_position::class);
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
