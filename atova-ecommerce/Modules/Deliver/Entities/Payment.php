<?php

namespace Modules\Deliver\Entities;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps      = false;
    protected $table        = "acc__receipts";

    protected $fillable     = ['date', 'employees_id', 'payer_id', 'payment_categories_id', 'payment_methods_id', 'transaction_number', 'amount', 'reason', 'note', 'deliver__invoice_id'];

    public function paymentMethod()
    {
        return $this->belongsTo('Modules\Deliver\Entities\PaymentMethod', 'payment_methods_id', 'id');
    }
}
