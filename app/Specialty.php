<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = [
        'name',
    ];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
    
}