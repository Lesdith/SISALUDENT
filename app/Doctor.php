<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'specialty_id',
    ];

    public function specialty()
    {
        return $this->belongsTo(specialty::class);
    }
}
