<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'user_id',
        'rol_id',
    ];
}
