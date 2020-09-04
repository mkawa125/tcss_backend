<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use Emadadly\LaravelUuid\Uuids;
class Message extends Model
{
    use Uuids;
    public $incrementing = false;

    protected $table = 'user_messages';

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'message_body',
        'email_address',
        'subject',
        'fullNames',
    ];

    protected $casts = [
      'created_at',
      'updated_at',
    ];
}
