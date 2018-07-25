<?php

namespace Sisaludent;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'mail',
        'date',
        'time',
        'description',
    ];}
