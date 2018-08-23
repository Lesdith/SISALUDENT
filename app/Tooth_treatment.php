<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Tooth_treatment extends Model
{
    protected $fillable = [
        'name',
        'cost',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function detail_treatment_plans()
    {
        return $this->hasMany(Detail_treatment_plan::class);
    }

   
}
