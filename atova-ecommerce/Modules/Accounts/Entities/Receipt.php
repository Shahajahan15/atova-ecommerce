<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public $timestamps      = false;
    protected $table        = "acc__receipts";

    protected $fillable     = ['date', 'employees_id', 'payer_id', 'payment_categories_id', 'payment_methods_id', 'transaction_number', 'amount', 'reason', 'note', 'deliver__invoice_id'];

    /**
     * Show Payment method
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('Modules\Accounts\Entities\PaymentMethod', 'payment_methods_id', 'id');
    }

    /**
     * For Employee Information
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('Modules\Accounts\Entities\User', 'employees_id', 'id');
    }

    /**
     * For Payer Information
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payer()
    {
        return $this->belongsTo('Modules\Accounts\Entities\User', 'payer_id', 'id');
    }

    /**
     * For Payer Information
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('Modules\Accounts\Entities\PaymentCategory', 'payment_categories_id', 'id');
    }
}
