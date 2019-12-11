<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $timestamps      = false;

    protected $table        = "stock";

    protected $fillable     = ['product_id', 'quantity', 'sub_stock'];

    public function product()
    {
        return $this->belongsTo('Modules\Product\Entities\Product', 'product_id', 'id');
    }
}
