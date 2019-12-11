<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    public $timestamps      = false;
    protected $table        = "product__attributes_group";

    protected $fillable     = ['title'];


    public static function groupList()
    {
        $groups = AttributeGroup::all();
        $list = array();
        foreach ($groups as $group) {
            $list[$group->id] = $group->title;
        }
        return $list;
    }


    public function attributes()
    {
        return $this->hasMany('Modules\Frontend\Entities\Attribute', 'attributes_group_id', 'id')->select('id', 'title');
    }


    public static function arrList()
    {
        $objs = AttributeGroup::all();
        $list = array();
        foreach ($objs as $obj) {
            $list[$obj->id] = $obj->title;
        }
        return $list;
    }


}
