<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Model;


class Message extends Model
{
    use Uuids;

    protected $table = 'messages';

    protected $keyType = 'string';

    protected $primaryKey = 'id';

    public $incrementing = false;

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
