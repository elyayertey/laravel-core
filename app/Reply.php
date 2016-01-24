<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    protected $table = "reply";
    protected $fillable = [
        'subject', 'content', 'message_id', 'user_id', 'active'
    ];
}
