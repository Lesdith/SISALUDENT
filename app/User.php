<?php

namespace IntelGUA\Sisaludent;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Caffeinated\Shinobi\Models;
use Caffeinated\Shinobi\Middleware;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Traits\ShinobiTrait;



class User extends Authenticatable
{
    use Notifiable;
    use ShinobiTrait;
    // use PermissionTrait;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

      public function roles()
    {
        return $this->belongsToMany('\Caffeinated\Shinobi\Models\Role')->withTimestamps();
    }

    public function permissions()
    {
        return $this->belongsToMany('\Caffeinated\Shinobi\Models\Permission')->withTimestamps();
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
