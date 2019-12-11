<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps      = false;
    protected $table        = "product__category";

    protected $fillable     = ['parent_id', 'title', 'description', 'image'];


    public function parent()
    {
        return $this->belongsTo('Modules\Frontend\Entities\Category', 'parent_id', 'id');
    }


    public function subCategories()
    {
        return $this->hasMany('Modules\Frontend\Entities\Category', 'parent_id', 'id');
    }


    public static function categoryList()
    {
        $categories = Category::all();
        $list = array();
        foreach ($categories as $category) {
            $title = '';
            if ($category->parent_id > 0) {
                if ($category->parent->parent_id > 0) {
                    $title .= $category->parent->parent->title . ' => ';
                    if ($category->parent->parent->parent_id > 0) {
                        $title .= $category->parent->parent->parent->title . ' => ';
                    }
                }
                $title .= $category->parent->title . ' => ';
            }
            $list[$category->id] = $title . $category->title;
        }
        return $list;
    }

}
