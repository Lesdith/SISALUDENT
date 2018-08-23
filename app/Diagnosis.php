<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $fillable = [
        'name',
    ];

    public function detail_treatment_plans()
    {
        return $this->hasMany(Detail_treatment_plan::class);
    }
}
