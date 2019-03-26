<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Emadadly\LaravelUuid\Uuids;
class Message extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'messages';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'message_body',
        'email_address',
        'subject',
        'fullNames',
        'status',
    ];

    protected $casts = [
      'created_at',
      'updated_at',
    ];
}
