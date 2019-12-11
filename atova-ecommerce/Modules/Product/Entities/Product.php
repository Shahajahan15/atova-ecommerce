<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps      = false;
    protected $table        = "product";

    protected $fillable     = ['title', 'description', 'slug', 'meta_tag', 'meta_description',
                            'ISBN', 'model', 'product_code', 'barcode', 'unite', 'price', 'cost_price',
                            'image', 'thumbnail', 'supplier_id', 'brand_id', 'users_id'];


    public function brand()
    {
        return $this->belongsTo('Modules\Product\Entities\Brand', 'brand_id');
    }

    public function user()
    {
        return $this->belongsTo('Modules\Product\Entities\User', 'users_id');
    }

    public function supplier()
    {
        return $this->belongsTo('Modules\Product\Entities\User', 'supplier_id');
    }


    public function categories()
    {
        return $this->belongsToMany('Modules\Product\Entities\Category', 'product__has__category', 'product_id', 'category_id');
    }


    public function details()
    {
        return $this->hasOne('Modules\Product\Entities\ProductDetails', 'product_id');
    }


    public function images()
    {
        return $this->hasMany('Modules\Product\Entities\Image', 'product_id');
    }


    public function specifications()
    {
        return $this->hasMany('Modules\Product\Entities\ProductAttribute', 'product_id');
    }

}
