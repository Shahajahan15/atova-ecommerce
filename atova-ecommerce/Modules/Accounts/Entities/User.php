<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table    = 'hr__users';
    protected $fillable = [
        'type', 'first_name', 'last_name', 'gender', 'mobile', 'email', 'image', 'password', 'remember_token'
    ];


    public static function listArray()
    {
        $all = User::all();
        $arr = array();
        foreach ($all as $item) {
            $arr[$item->id] =  $item->first_name . ' ' . $item->last_name. ' (' . $item->id .') ';
        }
        return $arr;
    }


}
