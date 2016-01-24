<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    //
    protected $table = "messages";
    protected $fillable = [
        'id', 'subject','email', 'content', 'sender_id', 'read'
    ];
}
