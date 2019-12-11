<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    public $timestamps      = false;
    protected $table        = "deliver__invoice_item";

    protected $fillable     = ['product_id', 'quantity', 'free', 'price', 'discount', 'total', 'deliver__invoice_id'];
}
