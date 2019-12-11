<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public $timestamps      = false;
    protected $table        = "stock";

    protected $fillable     = ['product_id', 'quantity', 'sub_stock'];
}
