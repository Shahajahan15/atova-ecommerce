<?php

namespace Modules\Frontend\Entities;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps      = false;

    protected $table        = "product__images";

    protected $fillable     = ['product_id', 'thumbnail', 'image', 'sort_order'];
}
