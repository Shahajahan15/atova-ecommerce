<?php

namespace Modules\Statistics\Entities;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    public $timestamps = false;

    protected $table    = 'expense';

    protected $fillable = ['date', 'employees_id', 'recipient_id', 'payment_methods_id', 'transaction_number', 'amount', 'reason', 'note', 'expense_category_id'];
}
