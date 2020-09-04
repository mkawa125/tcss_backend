<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use Emadadly\LaravelUuid\Uuids;

class School extends Model
{
    use Uuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $table = 'schools';
    public $incrementing = false;
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

    public function students(){
        $this->hasMany(Student::class);
    }

    public function staffs(){
        $this->hasMany(Staff::class);
    }

    public function school(){
        $this->belongsTo(School::class);
    }

    public static function rules(){
        return [
            'regNumber' => 'required|unique:schools',
            'name' => 'required|string',
            'schoolType' => 'required',
            'level' => 'required',
            'region' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'dateStarted' => 'required:date',
            'ownership' => 'required',
            'genderOrientation' => 'required',

        ];
    }
}
