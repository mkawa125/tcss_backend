<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\School;
use App\Models\User;
use Emadadly\LaravelUuid\Uuids;

class Student extends Model
{
    use Uuids;
    protected $fillable = [
        'userId',
        'indexNumber',
        'schoolId',
        'level',
        'dateStarted',
        'status',
        'dateFinished',
    ];

    protected $casts = [
        'created_at',
        'updated_at',
    ];
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    public function school(){
        $this->belongsTo(School::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }
    public static function rules(){
        return [
            'userId' => 'required',
            'indexNumber' => 'required',
            'schoolId' => 'required',
            'level' => 'required',
            'dateStarted' => 'required',
            'status' => 'required',
            'dateFinished' => 'required',
        ];
    }
}
