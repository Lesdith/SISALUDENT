<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
    ];

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
}
