<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name',
    ];

    public function municipalities()
    {
        return $this->hasMany(Municipality::class);
    }
    
}
