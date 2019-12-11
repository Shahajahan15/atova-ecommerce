<?php

namespace Modules\Receiving\Entities;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    public $timestamps      = false;
    protected $table        = "receiving__invoice_item";

    protected $fillable     = ['product_id', 'quantity', 'free', 'price', 'discount', 'total', 'receiving__invoice_id'];
}
