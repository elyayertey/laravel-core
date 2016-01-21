<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    //
    protected $table = "users";
    protected $fillable = [
        'name',
        'firstname',
        'lastname',
        'email',
        'gender',
        'bio',
        'phone',
        'street',
        'country',
        'city',
        'state',
        'zip'
    ];
}
