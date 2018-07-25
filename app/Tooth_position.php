<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Tooth_position extends Model
{
    protected $fillable = [
        'name',
    ];

    public function teeth()
    {
        return $this->hasMany(Tooth::class);
    }

}
