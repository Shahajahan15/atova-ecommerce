<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    public $timestamps      = false;

    protected $table        = "product__details";

    protected $fillable     = ['product_id', 'specification', 'product_details'];
}
