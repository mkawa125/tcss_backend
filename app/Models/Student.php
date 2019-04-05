<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\School;
use App\Models\User;

class Student extends Model
{
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

    public function school(){
        $this->belongsTo(School::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
