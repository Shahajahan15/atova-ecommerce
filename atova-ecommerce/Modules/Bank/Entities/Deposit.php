<?php

namespace Modules\Bank\Entities;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    public $timestamps = false;

    protected $table    = 'bank__deposit';

    protected $fillable = ['account_id', 'employees_id', 'amount', 'note', 'transaction_reason_id', 'date'];


    public function employee()
    {
        return $this->belongsTo('Modules\Bank\Entities\Employee', 'employees_id', 'users_id');
    }


    public function account()
    {
        return $this->belongsTo('Modules\Bank\Entities\BankAccount', 'account_id', 'id');
    }


    public function purpose()
    {
        return $this->belongsTo('Modules\Bank\Entities\TransactionReason', 'transaction_reason_id', 'id');
    }

}
