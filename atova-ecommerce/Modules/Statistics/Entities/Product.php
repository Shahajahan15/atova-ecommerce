<?php

namespace Modules\Statistics\Entities;

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
        return $this->belongsTo('Modules\Statistics\Entities\Brand', 'brand_id', 'id');
    }

}
