<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatsappLog extends Model
{
    protected $fillable = [
        'phone_number',
        'title',
        'message',
        'button_1',
        'status',
        'failed_reason'
    ];
}
