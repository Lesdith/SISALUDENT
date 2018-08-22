<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'treatment_plan_id',
        'date',
        'pay_debt',
        'balance_debt',
    ];
   
    public function treatment_plan()
    {
        return $this->belongsTo(Treatment_plan::class);
    }
}
