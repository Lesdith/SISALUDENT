<?php

namespace IntelGUA\Sisaludent;

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

    public function perform_treatments()
    {
        return $this->hasMany(Perform_treatment::class);
    }
}
