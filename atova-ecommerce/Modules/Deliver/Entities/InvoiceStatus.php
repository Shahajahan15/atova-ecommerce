<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class InvoiceStatus extends Model
{
    public $timestamps      = false;

    protected $table        = "deliver__status";

    public static function arrList()
    {
        $objs = InvoiceStatus::all();
        $list = array();
        foreach ($objs as $obj) {
            $list[$obj->id] = $obj->title;
        }
        return $list;
    }
}
