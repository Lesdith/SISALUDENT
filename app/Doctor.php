<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'address',
        'speciality_id',
    ];

    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
}
