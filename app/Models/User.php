<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;


class User extends Authenticatable implements JWTSubject
{
    use Uuids , Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'surname',
        'firstName',
        'middleName',
        'role',
        'password',
        'phoneNumber',
        'gender',
        'region',
        'district',
        'ward',
        'address',
        'dateOfBirth'

    ];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "type" of the ID column.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //defining constants
    const USER_ROLE_STUDENT = 'Student';
    const USER_ROLE_ADMIN = 'Admin';
    const USER_ROLE_TEACHER = 'Teacher';
    const USER_ROLE_HEADMASTER = 'Headmaster';


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function rules(){
        return [
            'email' => 'required|email',
            'firstName' => 'required',
            'middleName' => 'required',
            'surname' => 'required',
            'role' => 'required',
            'is_changed' => 'required',
            'password' => 'required',
        ];
    }
}
