<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'first_name', 
        'second_name', 
        'third_name', 
        'father_last_name', 
        'mother_last_name', 
        'gender_id', 
        'birth_date', 
        'location_id', 
        'address', 
        'municipality_id', 
        'phone_number',
        'image',
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
    
    public function clinic_histories()
    {
        return $this->hasMany(Clinic_history::class);
    }
    
    public function dental_histories()
    {
        return $this->hasMany(Dental_history::class);
    }
  
}
