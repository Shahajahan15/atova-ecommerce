<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class AddRedClass extends Model
{
    public $timestamps      = false;

    protected $table        = "settings__additions";

    public static function arrList()
    {
        $objs = AddRedClass::all();
        $list = array();
        foreach ($objs as $obj) {
            $list[$obj->id] = $obj->title . ' ('. $obj->value ;
            if($obj->type == 'percentage')
                $list[$obj->id] .= '%' ;

            $list[$obj->id] .= ')' ;
        }
        return $list;
    }
}
