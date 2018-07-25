<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Tooth_treatment extends Model
{
    protected $fillable = [
        'name',
        'cost',
    ];

    public function treatment_plans()
    {
        return $this->hasMany(Treatment_plan::class);
    }
}
