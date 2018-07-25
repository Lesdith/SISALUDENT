<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Daily_treatment_record extends Model
{
    protected $fillable = [
        'treatment_plan_id',
        'total',
        'pay_debt',
        'payment_date',
        'balance_debt',
    ];  
    
    public function treatment_plan()
    {
        return $this->belongsTo(Treatment_plan::class);
    }
}
