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
        'birth_date', 
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
    
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }


    public function treatment_plans()
    {
        return $this->hasMany(Treatment_plan::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
