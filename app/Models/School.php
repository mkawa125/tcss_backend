<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;

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
        'schoolType',
        'dateStarted',
        'genderOrientation'
    ];

    protected $casts = [
        'created_at',
        'updated_at',
    ];

    public function student(){
        $this->hasMany(Student::class);
    }

    public function staffs(){
        $this->hasMany(Staff::class);
    }

    public function school(){
        $this->belongsTo(School::class);
    }

    public function rules(){
        return [
          'regNumber' => 'required',
            'name' => 'required',
            'schoolType' => 'required'
        ];
    }
}
