<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Tooth extends Model
{
    protected $fillable = [
        'name',
        'tooth_type_id',
        'tooth_stage_id',
        'tooth_position',
    ];

    public function tooth_types()
    {
        return $this->belongsTo(Tooth_type::class);
    }

    public function tooth_stages()
    {
        return $this->belongsTo(Tooth_stage::class);
    }

    public function tooth_positions()
    {
        return $this->belongsTo(Tooth_position::class);
    }

    public function treatment_plans()
    {
        return $this->hasMany(Treatment_plan::class);
    }
}
