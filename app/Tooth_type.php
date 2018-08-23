<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Tooth_type extends Model
{
    protected $fillable = [
        'name',
    ];

    public function detail_treatment_plans()
    {
        return $this->hasMany(Detail_treatment_plan::class);
    }
}
