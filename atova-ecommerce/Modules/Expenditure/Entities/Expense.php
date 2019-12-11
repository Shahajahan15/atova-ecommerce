<?php

namespace Modules\Expenditure\Entities;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $timestamps = false;

    protected $table    = 'expense';

    protected $fillable = ['date', 'employees_id', 'recipient_id', 'payment_methods_id', 'transaction_number', 'amount', 'reason', 'note', 'expense_category_id'];


    /**
     * Show Payment method
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod()
    {
        return $this->belongsTo('Modules\Expenditure\Entities\PaymentMethod', 'payment_methods_id', 'id');
    }


    /**
     * For Employee Information
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function employee()
    {
        return $this->belongsTo('Modules\Expenditure\Entities\User', 'employees_id', 'id');
    }


    /**
     * For Recipient Information
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipient()
    {
        return $this->belongsTo('Modules\Expenditure\Entities\User', 'recipient_id', 'id');
    }


    /**
     * For Payer Information
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('Modules\Expenditure\Entities\ExpenseCategory', 'expense_category_id', 'id');
    }
}
