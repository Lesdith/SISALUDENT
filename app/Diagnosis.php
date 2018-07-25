<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = [
        'name',
    ];

    public function treatment_plans()
    {
        return $this->hasMany(Treatment_plan::class);
    }
}
