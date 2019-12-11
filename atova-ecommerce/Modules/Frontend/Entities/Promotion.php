<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    public $timestamps      = false;

    protected $table        = "product__promotions";

    protected $fillable     = ['product_id', 'title', 'price', 'start_date', 'end_date'];
}
