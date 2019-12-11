<?php

namespace Modules\Statistics\Entities;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public $timestamps      = false;
    protected $table        = "acc__receipts";

    protected $fillable     = ['date', 'employees_id', 'payer_id', 'payment_categories_id', 'payment_methods_id', 'transaction_number', 'amount', 'reason', 'note', 'deliver__invoice_id'];

}
