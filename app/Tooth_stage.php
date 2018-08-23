<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Tooth_stage extends Model
{
    protected $fillable = [
        'name',
    ];

    public function teeth()
    {
        return $this->hasMany(Tooth::class);
    }
}
