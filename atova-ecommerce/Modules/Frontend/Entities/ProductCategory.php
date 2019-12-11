<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    public $timestamps      = false;

    protected $table        = "product__has__category";
}
