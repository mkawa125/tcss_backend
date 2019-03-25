<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Emadadly\LaravelUuid\Uuids;

class User extends Authenticatable
{
    use Notifiable;
    use Uuids;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $incrementing = false;

    protected $fillable = [
        'name', 'email', 'password', 'fullName','surname', 'middleName', 'role', 'is_changed',
        'phoneNumber'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
