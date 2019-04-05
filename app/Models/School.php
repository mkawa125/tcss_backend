<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'regNumber',
        'name',
        'level',
        'region',
        'ward',
        'district',
        'ownership',
        'school_type',
        'date_started',
        'gender_orientation'
    ];

    protected $casts = [
        'created_at',
        'updated_at',
    ];
}
