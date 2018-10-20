<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
class Event extends Model
{
 protected $fillable = [
     'contacto',
     'telefono',
     'start_date',
     'end_date'
    ];
}
