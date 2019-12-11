<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    public $timestamps      = false;

    protected $table        = "product__products_attributes";

    protected $fillable     = ['product_id', 'attributes_id', 'value'];

    public function attribute()
    {
        return $this->belongsTo('Modules\Frontend\Entities\Attribute', 'attributes_id')->select('id', 'title');
    }
}
