<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'date',
        'time',
        //'reservation_method_id',
        'description',
    ];
    
 
}
