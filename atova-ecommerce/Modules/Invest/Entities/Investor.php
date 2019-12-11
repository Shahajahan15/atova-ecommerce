<?php

namespace Modules\Invest\Entities;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    public $timestamps      = false;
    protected $table        = "invest__investors";

    protected $fillable     = [
        'name', 'father_name', 'mother_name', 'gender', 'religion', 'date_of_birth', 'mobile', 'email', 'nid', 'address',
        'image', 'nominee_name', 'nominee_address', 'nominee_mobile', 'nominee_nid', 'nominee_relation', 'nominee_image'
    ];


    public static function listArray()
    {
        $all = Investor::all();
        $arr = array();
        foreach ($all as $item) {
            $arr[$item->id] = $item->name;
        }
        return $arr;
    }
}
