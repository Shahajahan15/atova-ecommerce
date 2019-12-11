<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps      = false;
    protected $table        = "product";

    protected $fillable     = ['title', 'description', 'slug', 'meta_tag', 'meta_description',
                            'ISBN', 'model', 'product_code', 'barcode', 'unite', 'price', 'cost_price',
                            'thumbnail', 'supplier_id', 'brand_id', 'users_id'];

}
