<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps      = false;
    protected $table        = "product__brand";

    protected $fillable     = ['title', 'description', 'image', 'country'];


    public static function brandList()
    {
        $brands = Brand::all();
        $list = array();
        foreach ($brands as $brand) {
            $list[$brand->id] = $brand->title;
        }
        return $list;
    }

}
