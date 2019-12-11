<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps      = false;
    protected $table        = "product__attributes";

    protected $fillable     = ['attributes_group_id', 'title', 'order'];


    public function group()
    {
        return $this->belongsTo('Modules\Product\Entities\AttributeGroup', 'attributes_group_id', 'id');
    }


    public static function arrList()
    {
        $objs = Attribute::all();
        $list = array();
        foreach ($objs as $obj) {
            $list[$obj->id] = $obj->title;
        }
        return $list;
    }
}
