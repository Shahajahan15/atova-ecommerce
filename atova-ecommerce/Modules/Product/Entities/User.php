<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table    = 'hr__users';
    protected $fillable = [
        'type', 'first_name', 'last_name', 'gender', 'mobile', 'email', 'image', 'password', 'remember_token'
    ];

}
