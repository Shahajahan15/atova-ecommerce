<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public $timestamps      = false;

    protected $table        = "product__discount";

    protected $fillable     = ['product_id', 'title', 'amount', 'start_date', 'end_date'];
}
