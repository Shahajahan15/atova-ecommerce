<?php

namespace Modules\Accounts\Entities;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $timestamps      = false;
    protected $table        = "acc__payments";

    protected $fillable = ['date', 'employees_id', 'recipient_id', 'payment_categories_id', 'payment_methods_id', 'transaction_number', 'amount', 'reason', 'note', 'receiving__invoice_id'];


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
     * For Recipient Information
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo('Modules\Accounts\Entities\User', 'recipient_id', 'id');
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
