<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        
    ];
    public function tooth_treatments()
    {
        return $this->hasMany(Tooth_treatment::class);
    }

    
}
