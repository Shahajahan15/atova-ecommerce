<?php

namespace Modules\Statistics\Entities;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps      = false;
    protected $table        = "acc__payments";

    protected $fillable = ['date', 'employees_id', 'recipient_id', 'payment_categories_id', 'payment_methods_id', 'transaction_number', 'amount', 'reason', 'note', 'receiving__invoice_id'];


}
