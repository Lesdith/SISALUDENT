<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name', 
        'second_name', 
        'third_name', 
        'first_surname', 
        'second_surname', 
        'gender_id', 
        'birthdate', 
        'location_id', 
        'address', 
        'municipality_id', 
        'phone_number',
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function muicipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function treatment_plans()
    {
        return $this->hasMany(Treatment_plan::class);
    }
}
