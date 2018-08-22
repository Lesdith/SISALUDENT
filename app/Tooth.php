<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Tooth extends Model
{
    protected $fillable = [
        'name',
        'tooth_type_id',
        'tooth_stage_id',
        'tooth_position_id',
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

    public function detail_treatment_plans()
    {
        return $this->hasMany(Detail_treatment_plan::class);
    }
    
}
